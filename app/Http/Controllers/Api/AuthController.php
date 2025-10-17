<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\GenerateResetTokenRequest;
use App\Http\Requests\Api\Auth\ResetPasswordRequest;
use App\Http\Requests\Api\Auth\UserRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Responses\ApiResponse;
use App\Http\Traits\UserTrait;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    use UserTrait;

    public function login(Request $request)
    {
        try {
            $user = User::withTrashed()->where('email', $request->email)->first();

            if ($user && $user->trashed()) {
                return ApiResponse::error('Account has been deleted', 403);
            }

            if (!Auth::attempt($request->only('email', 'password'))) {
                return ApiResponse::error('User Unauthorized', 401);
            }

            $user = User::where('id', Auth::id())->first();

            if (!$user->is_active) {
                return ApiResponse::error('Account is inactive', 403);
            }

            $token = $user->createToken('token')->plainTextToken;

            return ApiResponse::success('User Authorized', 200, [
                'token' => $token
            ]);
        } catch (\Exception $e) {
            return ApiResponse::error('Login failed', 500, [
                'error' => $e->getMessage()
            ]);
        }
    }

    public function userRegister(UserRegisterRequest $request)
    {
        try {
            $user = $this->createUser((object) $request->all());

            if (!$user) {
                return ApiResponse::error('Failed to create user', 500);
            }

            $this->createProfile($user->id, (object) $request->all());
            event(new Registered($user));

            return ApiResponse::success('User created successfully', 201, [
                'user' => new UserResource($user)
            ]);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to create user', 500, [
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function generateResetToken(GenerateResetTokenRequest $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => Hash::make($token),
                'created_at' => Carbon::now(),
            ]
        );

        return ApiResponse::success('Token generated successfully', 200, [
            'token' => $token,
            'email' => $user->email,
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $record = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$record || !Hash::check($request->token, $record->token)) {
            return ApiResponse::error('Invalid or expired token', 400);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $user->password = Hash::make($request->password);
        $user->setRememberToken(Str::random(60));
        $user->save();

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return ApiResponse::success('Password reset successfully', 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return ApiResponse::success('User logged out successfully', 200);
    }
}

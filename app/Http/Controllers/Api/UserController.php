<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\UpdateBasicInfoRequest;
use App\Http\Requests\Api\User\UpdatePasswordRequest;
use App\Http\Requests\Api\User\UpdatePersonalDataRequest;
use App\Http\Requests\Api\User\UpdateSocialProfileRequest;
use App\Http\Resources\UserResource;
use App\Http\Responses\ApiResponse;
use App\Http\Traits\UserTrait;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserController extends Controller
{
    use UserTrait;

    public function fetchAuthUser(Request $request)
    {
        try {
            $user = $request->user();

            return ApiResponse::success('User retrieved successfully', 200, [
                'user' => new UserResource($user)
            ]);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to fetch user.', 500, [
                'error' => $e->getMessage()
            ]);
        }
    }

    public function updateBasicInfo(UpdateBasicInfoRequest $request)
    {
        try {
            $user = $request->user();
            $user->update($request->validated());

            return ApiResponse::success('User updated successfully', 200, [
                'user' => new UserResource($user)
            ]);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to update user.', 500, [
                'error' => $e->getMessage()
            ]);
        }
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        try {
            $user = $request->user();
            $user->update([
                'password' => bcrypt($request->input('password'))
            ]);

            return ApiResponse::success('Password updated successfully', 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to update password.', 500, [
                'error' => $e->getMessage()
            ]);
        }
    }

    public function updatePersonalData(UpdatePersonalDataRequest $request)
    {
        return $this->handleProfileUpdate($request);
    }

    public function updateSocialProfile(UpdateSocialProfileRequest $request)
    {
        return $this->handleProfileUpdate($request);
    }

    public function deactivateAccount(Request $request)
    {
        try {
            $user = $request->user();
            $user->update(['is_active' => false]);

            return ApiResponse::success('Account deactivated successfully', 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to deactivate account.', 500, [
                'error' => $e->getMessage()
            ]);
        }
    }

    public function deleteAccount(Request $request)
    {
        try {
            $user = $request->user();
            $user->tokens()->delete();
            $user->delete();

            return ApiResponse::success('Account deleted successfully', 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to delete account.', 500, [
                'error' => $e->getMessage()
            ]);
        }
    }

    private function handleProfileUpdate(FormRequest $request)
    {
        try {
            $user = $request->user();
            $user->profile->update($request->validated());

            return ApiResponse::success('User updated successfully', 200, [
                'user' => new UserResource($user)
            ]);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to update user.', 500, [
                'error' => $e->getMessage()
            ]);
        }
    }
}

<?php

namespace App\Http\Traits;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait  UserTrait
{
   private function createUser($request)
   {
      return User::create([
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
      ])->assignRole('user');
   }

   private function createProfile($userId, $request)
   {
      return Profile::create([
         'user_id' => $userId,
         'cpf' => $request->cpf,
         'phone' => $request->phone ?? null,
         'whatsapp' => $request->whatsapp ?? null,
         'birthday' => $request->birthday ?? null,
         'cep' => $request->cep ?? null,
         'state' => $request->state ?? null,
         'city' => $request->city ?? null,
         'neighborhood' => $request->neighborhood ?? null,
         'street' => $request->street ?? null,
         'number' => $request->number ?? null,
         'complement' => $request->complement ?? null,
         'x' => $request->x ?? null,
         'facebook' => $request->facebook ?? null,
         'instagram' => $request->instagram ?? null,
         'youtube' => $request->youtube ?? null,
         'tiktok' => $request->tiktok ?? null,
         'about_me' => $request->about_me ?? null
      ]);
   }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'emailVerifiedAt' => $this->email_verified_at,
            'isActive' => $this->is_active,
            'profile' => [
                'cpf' => $this->profile->cpf,
                'phone' => $this->profile->phone,
                'whatsapp' => $this->profile->whatsapp,
                'birthday' => $this->profile->birthday,
                'address' => [
                    'cep' => $this->profile->cep,
                    'state' => $this->profile->state,
                    'city' => $this->profile->city,
                    'neighborhood' => $this->profile->neighborhood,
                    'street' => $this->profile->street,
                    'number' => $this->profile->number,
                    'complement' => $this->profile->complement,
                ],
                'x' => $this->profile->x,
                'facebook' => $this->profile->facebook,
                'instagram' => $this->profile->instagram,
                'youtube' => $this->profile->youtube,
                'tiktok' => $this->profile->tiktok,
                'about_me' => $this->profile->about_me,
                'avatar_url' => $this->profile->avatar_url,
            ],
            'roles' => $this->roles->map(function ($role) {
                return [
                    'name' => $role->name,
                ];
            }),
        ];
    }
}

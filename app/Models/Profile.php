<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'cpf',
        'phone',
        'whatsapp',
        'birthday',
        'cep',
        'state',
        'city',
        'neighborhood',
        'street',
        'number',
        'complement',
        'x',
        'facebook',
        'instagram',
        'youtube',
        'tiktok',
        'about_me',
        'avatar_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

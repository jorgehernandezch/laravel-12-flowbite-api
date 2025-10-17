<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Responses\ApiResponse;

class UpdateSocialProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'x' => 'nullable|max:255',
            'facebook' => 'nullable|max:255',
            'instagram' => 'nullable|max:255',
            'youtube' => 'nullable|max:255',
            'tiktok' => 'nullable|max:255',
            'about_me' => 'nullable|max:255',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, ApiResponse::error(
            'Validation failed',
            422,
            $validator->errors()->toArray()
        ));
    }
}

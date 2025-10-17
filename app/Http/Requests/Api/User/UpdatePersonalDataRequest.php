<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Responses\ApiResponse;

class UpdatePersonalDataRequest extends FormRequest
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
            'cpf' => 'required|cpf|unique:profiles,cpf,' . $this->user()->profile->id,
            'phone' => 'nullable|max:14',
            'whatsapp' => 'nullable|max:14',
            'birthday' => 'nullable|date_format:Y-m-d',
            'cep' => 'nullable|max:9',
            'state' => 'nullable|max:2',
            'city' => 'nullable|max:255',
            'neighborhood' => 'nullable|max:255',
            'street' => 'nullable|max:255',
            'number' => 'nullable|max:255',
            'complement' => 'nullable|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'cpf.required' => 'CPF is required',
            'cpf.cpf' => 'CPF must be a valid CPF number',
            'cpf.unique' => 'CPF has already been taken',
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

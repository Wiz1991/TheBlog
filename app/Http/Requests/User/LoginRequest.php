<?php

namespace App\Http\Requests\User;

class LoginRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user.email' => 'required',
            'user.password' => 'required'
        ];
    }
}
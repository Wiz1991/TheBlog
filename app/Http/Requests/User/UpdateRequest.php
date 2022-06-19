<?php

namespace App\Http\Requests\User;

class UpdateRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user.username' => 'sometimes|string|max:50|unique:users,username',
            'user.email' => 'sometimes|email|max:255|unique:users,email',
            'user.password' => 'sometimes',
        ];
    }
}
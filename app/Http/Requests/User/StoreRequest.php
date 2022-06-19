<?php

namespace App\Http\Requests\User;

class StoreRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user.username' => 'required|string|max:50|unique:users,username',
            'user.email' => 'required|email|max:255|unique:users,email',
            'user.password' => 'required'
        ];
    }
}
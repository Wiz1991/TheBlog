<?php

namespace App\Http\Requests\Article;

class DestroyRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function authorize(): bool
    {
        return $this->route('article')->user->id === auth()->id();
    }

    public function rules(): array
    {
        return [];
    }
}
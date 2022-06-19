<?php

namespace App\Http\Requests\Article;

class StoreRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'article.title' => 'required|string|max:255',
            'article.body' => 'required|string|max:2048',
            'article.tagList' => 'sometimes|array',
            'article.tagList.*' => 'sometimes|string|max:255'
        ];
    }
}
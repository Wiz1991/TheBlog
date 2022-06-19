<?php

namespace App\Http\Requests\Article;

class IndexRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tag' => 'sometimes|string',
            'author' => 'sometimes|string',
            'limit' => 'sometimes|integer',
            'offset' => 'sometimes|integer'
        ];
    }

}
<?php

namespace App\Http\Resources;

class ArticleResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    public static $wrap = 'article';

    public function toArray($request): array
    {
        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'body' => $this->body,
            'tagList' => $this->tags->pluck('name'),
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'author' => [
                'username' => $this->user->username,
            ]
        ];
    }
}
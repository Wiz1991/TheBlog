<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\DestroyRequest;
use App\Http\Requests\Article\IndexRequest;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\User;
use Validator;
use App\Services\ArticleService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Log;

class ArticleController extends BaseController
{
    protected Article $article;
    protected ArticleService $articleService;
    protected User $user;

    public function __construct(Article $article, ArticleService $articleService, User $user)
    {
        $this->article = $article;
        $this->articleService = $articleService;
        $this->user = $user;
    }

    public function index(IndexRequest $request): ArticleCollection
    {
        return new ArticleCollection($this->article->getFiltered($request->validated()));
    }

    public function store(StoreRequest $request): ArticleResource {

        $article = Auth::guard()->user()->articles()->create($request->validated()['article']);

        $this->articleService->syncTags($article, $request->validated()['article']['tagList'] ?? []);

        return $this->articleResponse($article);
    }

    public function show(Article $article): ArticleResource {
        return $this->articleResponse($article);
    }

    public function destroy(Article $article, DestroyRequest $request): void {
        $article->delete();
    }

    public function update(Article $article, UpdateRequest $request): ArticleResource {
        $article->update($request->validated()['article']);

        $this->articleService->syncTags($article, $request->validated()['article']['tagList'] ?? []);

        return $this->articleResponse($article);
    }

    protected function articleResponse(Article $article): ArticleResource
    {
        return new ArticleResource($article->load('user', 'users', 'tags'));
    }
}

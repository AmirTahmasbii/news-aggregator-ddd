<?php

declare(strict_types=1);

namespace Presentation\ArticleManagement\Controllers;

use Application\Article\Contracts\ArticleServiceContract;
use Application\Article\Data\ArticleData;
use Application\Bus\Contracts\CommandBusContract;
use Application\Bus\Contracts\QueryBusContract;
use Domain\Article\Entities\Article;
use Presentation\Controller;

class ArticleController extends Controller
{
    public function __construct(
        protected CommandBusContract $commandBus,
        protected QueryBusContract $queryBus,
        protected ArticleServiceContract $articleService,
    ) {}

    public function index(): \Illuminate\Http\JsonResponse
    {
        $articles = $this->articleService->index();

        $dataList = ArticleData::collect($articles);

        return response()->json([
            'status' => 'success',
            'data' => $dataList,
            'meta' => [
                'total' => $articles->total(),
                'perPage' => $articles->perPage(),
                'currentPage' => $articles->currentPage(),
            ],
        ]);
    }

    public function show(Article $article): \Illuminate\Http\JsonResponse
    {
        $articleData = ArticleData::from($article);

        return response()->json([
            'status' => 'success',
            'data' => $articleData,
        ]);
    }
}

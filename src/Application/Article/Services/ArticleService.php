<?php

declare(strict_types=1);

namespace Application\Article\Services;

use Application\Article\Contracts\ArticleServiceContract;
use Domain\Article\Repositories\ArticleRepositoryContract;
use Domain\Preference\Entities\Preference;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService implements ArticleServiceContract
{
    public function __construct(public ArticleRepositoryContract $articleRepository) {}

    public function index(): LengthAwarePaginator
    {
        return $this->articleRepository->index();
    }

    public function personalizedFeed(Preference $preference): LengthAwarePaginator
    {
        return $this->articleRepository->personalizedFeed($preference);
    }
}

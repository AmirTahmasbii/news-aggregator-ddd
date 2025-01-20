<?php

declare(strict_types=1);

namespace Domain\Article\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleRepositoryContract
{
    public function index(): LengthAwarePaginator;
}

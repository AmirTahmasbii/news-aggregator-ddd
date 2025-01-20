<?php

declare(strict_types=1);

namespace Application\Article\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleServiceContract
{
    public function index(): LengthAwarePaginator;
}

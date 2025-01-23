<?php

declare(strict_types=1);

namespace Application\Article\Contracts;

interface FetchArticleApiServiceContract
{
    public function fetchAndStoreArticles(): void;
}

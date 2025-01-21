<?php

declare(strict_types=1);

namespace Domain\Article\Repositories;

use Domain\Preference\Entities\Preference;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleRepositoryContract
{
    public function index(): LengthAwarePaginator;

    public function personalizedFeed(Preference $preference): LengthAwarePaginator;
}

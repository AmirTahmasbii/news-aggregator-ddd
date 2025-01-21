<?php

declare(strict_types=1);

namespace Application\Article\Contracts;

use Domain\Preference\Entities\Preference;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleServiceContract
{
    public function index(): LengthAwarePaginator;

    public function personalizedFeed(Preference $preference): LengthAwarePaginator;
}

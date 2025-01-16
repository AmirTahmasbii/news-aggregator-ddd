<?php

declare(strict_types=1);

namespace Application\Article\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Data;

class ArticleData extends Data
{
    public function __construct(
        public string $name,
        public string $title,
        public string $content,
        public string $keywords,
        public string $category,
        public string $author,
        public int $source_id,
        public Carbon $published_at
    ) {}
}

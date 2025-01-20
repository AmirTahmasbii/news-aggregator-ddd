<?php

declare(strict_types=1);

namespace Application\Article\Data;

use Application\Source\Data\SourceData;
use Carbon\Carbon;
use Domain\Article\Entities\Article;
use Spatie\LaravelData\Data;

class ArticleData extends Data
{
    public function __construct(
        public string $title,
        public string $content,
        public string $keywords,
        public string $category,
        public string $author,
        public SourceData $source,
        public Carbon $published_at
    ) {}

    public static function fromModel(Article $article): self
    {
        return new self(
            title: $article->title,
            content: $article->content,
            keywords: $article->keywords,
            category: $article->category,
            author: $article->author,
            source: SourceData::fromModel($article->source),
            published_at: $article->published_at,
        );
    }
}

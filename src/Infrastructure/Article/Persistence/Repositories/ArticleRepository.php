<?php

declare(strict_types=1);

namespace Infrastructure\Article\Persistence\Repositories;

use Domain\Article\Entities\Article;
use Domain\Article\Repositories\ArticleRepositoryContract;
use Domain\Preference\Entities\Preference;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class ArticleRepository implements ArticleRepositoryContract
{
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Article::class)
            ->allowedFilters([
                AllowedFilter::partial('keywords'),
                AllowedFilter::partial('content'),
                AllowedFilter::exact('category'),
                AllowedFilter::scope('published_between'),
                AllowedFilter::exact('source', 'source.name'),
            ])
            ->join('sources', 'articles.source_id', '=', 'sources.id')
            ->defaultSort('-published_at')
            ->paginate(10);
    }

    public function personalizedFeed(Preference $preference): LengthAwarePaginator
    {
        return Article::query()
        ->where('category', $preference->category)
        ->orWhere('author', $preference->author)
        ->orWhere('source_id', $preference->source_id)
        ->paginate();
    }
}

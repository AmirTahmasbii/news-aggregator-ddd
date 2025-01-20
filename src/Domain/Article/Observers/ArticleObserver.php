<?php

declare(strict_types=1);

namespace Domain\Article\Observers;

use Domain\Article\Entities\Article;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class ArticleObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Article "created" event.
     */
    public function created(Article $article): void
    {
        // ...
    }

    /**
     * Handle the Article "updated" event.
     */
    public function updated(Article $article): void
    {
        // ...
    }

    /**
     * Handle the Article "deleted" event.
     */
    public function deleted(Article $article): void
    {
        // ...
    }

    /**
     * Handle the Article "restored" event.
     */
    public function restored(Article $article): void
    {
        // ...
    }

    /**
     * Handle the Article "forceDeleted" event.
     */
    public function forceDeleted(Article $article): void
    {
        // ...
    }
}

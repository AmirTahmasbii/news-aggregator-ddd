<?php

declare(strict_types=1);

namespace Domain\Source\Observers;

use Domain\Source\Entities\Source;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class SourceObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Source "created" event.
     */
    public function created(Source $source): void
    {
        // ...
    }

    /**
     * Handle the Source "updated" event.
     */
    public function updated(Source $source): void
    {
        // ...
    }

    /**
     * Handle the Source "deleted" event.
     */
    public function deleted(Source $source): void
    {
        // ...
    }

    /**
     * Handle the Source "restored" event.
     */
    public function restored(Source $source): void
    {
        // ...
    }

    /**
     * Handle the Source "forceDeleted" event.
     */
    public function forceDeleted(Source $source): void
    {
        // ...
    }
}

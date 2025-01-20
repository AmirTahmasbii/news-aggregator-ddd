<?php

declare(strict_types=1);

namespace Domain\Preference\Observers;

use Domain\Preference\Entities\Preference;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class PreferenceObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Preference "created" event.
     */
    public function created(Preference $preference): void
    {
        // ...
    }

    /**
     * Handle the Preference "updated" event.
     */
    public function updated(Preference $preference): void
    {
        // ...
    }

    /**
     * Handle the Preference "deleted" event.
     */
    public function deleted(Preference $preference): void
    {
        // ...
    }

    /**
     * Handle the Preference "restored" event.
     */
    public function restored(Preference $preference): void
    {
        // ...
    }

    /**
     * Handle the Preference "forceDeleted" event.
     */
    public function forceDeleted(Preference $preference): void
    {
        // ...
    }
}

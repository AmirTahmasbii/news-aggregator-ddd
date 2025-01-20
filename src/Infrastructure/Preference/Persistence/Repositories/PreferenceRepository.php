<?php

declare(strict_types=1);

namespace Infrastructure\Preference\Persistence\Repositories;

use Application\Preference\Data\PreferenceData;
use Domain\Preference\Entities\Preference;
use Domain\Preference\Repositories\PreferenceRepositoryContract;


final class PreferenceRepository implements PreferenceRepositoryContract
{
    public function show(): Preference
    {
        return Preference::where('user_id', auth()->id())->with('source')->first();
    }

    public function create(PreferenceData $preferenceData): Preference
    {
        return Preference::updateOrCreate(
            [
                'user_id' => auth()->id(),
            ],
            [
                'author' => $preferenceData->author,
                'category' => $preferenceData->category,
                'source_id' => $preferenceData->source_id,
            ]
        );
    }
}

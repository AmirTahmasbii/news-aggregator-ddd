<?php

declare(strict_types=1);

namespace Domain\Preference\Repositories;

use Application\Preference\Data\PreferenceData;
use Domain\Preference\Entities\Preference;

interface PreferenceRepositoryContract
{
    public function show(): Preference;

    public function create(PreferenceData $preferenceData): Preference;
}

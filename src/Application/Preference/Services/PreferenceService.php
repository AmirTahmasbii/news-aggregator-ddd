<?php

declare(strict_types=1);

namespace Application\Preference\Services;

use Application\Preference\Contracts\PreferenceServiceContract;
use Domain\Preference\Repositories\PreferenceRepositoryContract;

class PreferenceService implements PreferenceServiceContract
{
    public function __construct(public PreferenceRepositoryContract $preferenceRepository) {}
}

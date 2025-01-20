<?php
declare(strict_types=1);

namespace Application\Preference\Commands;

use Application\Bus\Command;
use Application\Preference\Data\PreferenceData;

class CreatePreferenceCommand extends Command
{
    public function __construct(
        public PreferenceData $preferenceData,
    ) {}


}
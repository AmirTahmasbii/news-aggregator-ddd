<?php

declare(strict_types=1);

namespace Application\Preference\CommandHandlers;

use Application\Bus\CommandHandler;
use Application\Preference\Commands\CreatePreferenceCommand;
use Domain\Preference\Entities\Preference;
use Domain\Preference\Repositories\PreferenceRepositoryContract;

final class CreatePreferenceCommandHandler extends CommandHandler
{
    public function __construct(private PreferenceRepositoryContract $preferenceRepository) {}

    public function handle(CreatePreferenceCommand $command): Preference
    {
        return $this->preferenceRepository->create($command->preferenceData);
    }
}

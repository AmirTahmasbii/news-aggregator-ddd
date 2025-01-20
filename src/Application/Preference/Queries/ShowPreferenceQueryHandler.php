<?php

declare(strict_types=1);

namespace Application\Preference\Queries;

use Application\Bus\QueryHandler;
use Domain\Preference\Repositories\PreferenceRepositoryContract;

final class ShowPreferenceQueryHandler extends QueryHandler
{
    public function __construct(
        protected readonly PreferenceRepositoryContract $repository,
    ) {}

    public function handle(ShowPreferenceQuery $query): ?object
    {
        return $this->repository->show(
            $query->getUserId(),
        );
    }
}

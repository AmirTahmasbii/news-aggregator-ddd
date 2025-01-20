<?php

declare(strict_types=1);

namespace Application\Source\Services;

use Application\Source\Contracts\SourceServiceContract;
use Domain\Source\Repositories\SourceRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class SourceService implements SourceServiceContract
{
    public function __construct(public SourceRepositoryContract $sourceRepository) {}

    public function index(): Collection
    {
        return $this->sourceRepository->index();
    }
}

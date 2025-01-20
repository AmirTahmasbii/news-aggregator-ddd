<?php

declare(strict_types=1);

namespace Infrastructure\User\Persistence\Repositories;

use Domain\Source\Entities\Source;
use Domain\Source\Repositories\SourceRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

final class SourceRepository implements SourceRepositoryContract
{
    public function index(): Collection
    {
        return Source::all();
    }
}

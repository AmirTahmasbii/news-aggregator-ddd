<?php

declare(strict_types=1);

namespace Domain\Source\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface SourceRepositoryContract
{
    public function index(): Collection;
}

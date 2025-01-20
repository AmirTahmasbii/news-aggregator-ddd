<?php

declare(strict_types=1);

namespace Application\Source\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface SourceServiceContract
{
    public function index(): Collection;
}

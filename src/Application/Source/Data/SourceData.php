<?php

declare(strict_types=1);

namespace Application\Source\Data;

use Domain\Source\Entities\Source;
use Spatie\LaravelData\Data;

class SourceData extends Data
{
    public function __construct(
        public string $name,
    ) {}

    public static function fromModel(Source $source): self
    {
        return new self(
            name: $source->name,
        );
    }
}

<?php

declare(strict_types=1);

namespace Application\Preference\Data;

use Spatie\LaravelData\Data;

class PreferenceData extends Data
{
    public function __construct(
        public string $author,
        public string $category,
        public int $source_id,
    ) {
    }
}

<?php

declare(strict_types=1);

namespace Application\Preference\Data;

use Application\Source\Data\SourceData;
use Spatie\LaravelData\Data;

class PreferencesListData extends Data
{
    public string $author;
    public string $category;
    public SourceData $source;
}

<?php

declare(strict_types=1);

namespace Application\Article\Data;

use Application\Source\Data\SourceData;
use Carbon\Carbon;
use Spatie\LaravelData\Data;

class ArticlesListData extends Data
{
    public string $title;
    public string $content;
    public string $keywords;
    public string $category;
    public string $author;
    public SourceData $source;
    public Carbon $published_at;
    public Carbon $created_at;
    public Carbon $updated_at;
}

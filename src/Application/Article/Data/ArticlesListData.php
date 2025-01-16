<?php

declare(strict_types=1);

namespace Application\Article\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Data;

class ArticlesListData extends Data
{
    public int $id;
    public string $name;
    public string $email;
    public string $title;
    public string $content;
    public string $keywords;
    public string $category;
    public string $author;
    public int $source_id;
    public Carbon $published_at;
    public Carbon $created_at;
    public Carbon $updated_at;
}

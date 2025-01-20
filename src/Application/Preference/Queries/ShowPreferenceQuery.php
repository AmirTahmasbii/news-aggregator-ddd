<?php
declare(strict_types=1);

namespace Application\Preference\Queries;

use Application\Bus\Query;

final class ShowPreferenceQuery extends Query
{
    public function __construct(private readonly int $user_id) {}

    public function getUserId(): int
    {
        return $this->user_id;
    }
}
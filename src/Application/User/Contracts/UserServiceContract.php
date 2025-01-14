<?php

declare(strict_types=1);

namespace Application\User\Contracts;

use Application\User\Data\UserData;

interface UserServiceContract
{
    public function sendResetPasswordEmail(string $email): bool;

    public function resetPassword(array $data): bool;
}

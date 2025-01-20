<?php

declare(strict_types=1);

namespace Application\User\Services;

use Application\User\Contracts\UserServiceContract;
use Domain\User\Repositories\UserRepositoryContract;

class UserService implements UserServiceContract
{
    public function __construct(private UserRepositoryContract $userRepository) {}

    public function sendResetPasswordEmail(string $email): bool
    {
        return $this->userRepository->sendResetPasswordEmail($email);
    }

    public function resetPassword(array $data): bool
    {
        return $this->userRepository->resetPassword($data);
    }
}

<?php

declare(strict_types=1);

namespace Application\User\Services;

use Application\User\Contracts\UserServiceContract;
use Application\User\Data\UserData;
use Domain\User\Entities\User;
use Domain\User\Repositories\UserRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

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

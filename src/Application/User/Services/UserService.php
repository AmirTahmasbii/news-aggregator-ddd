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

    public function register(UserData $userData)
    {
        return $this->userRepository->create($userData);
    }

    public function login(string $email, string $password)
    {
        return $this->userRepository->login($email, $password);
    }

    public function logout(User $user)
    {
        return $this->userRepository->logout($user);
    }
}

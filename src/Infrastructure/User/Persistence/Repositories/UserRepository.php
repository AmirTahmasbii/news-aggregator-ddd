<?php

declare(strict_types=1);

namespace Infrastructure\User\Persistence\Repositories;

use Application\User\Data\UserData;
use Domain\User\Entities\User;
use Domain\User\Repositories\UserRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

final class UserRepository implements UserRepositoryContract
{
    public function create(UserData $data): string
    {

        $user = User::create($data->all());

        $token = $user->createToken('bearer', ['*'], now()->addWeek());

        return $token->plainTextToken;
    }

    public function login(string $email, string $password): ?string
    {
        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return null;
        }

        $user->tokens()->delete();

        return $user->createToken('bearer', ['*'], now()->addWeek())->plainTextToken;
    }

    public function logout(User $user): void
    {
        $user->tokens()->delete();
    }

    public function getAllUsers(): Collection
    {
        return User::all();
    }

    public function update(int $id, UserData $data): bool
    {
        $user = User::findOrFail($id);

        return $user->update($data->all());
    }
}

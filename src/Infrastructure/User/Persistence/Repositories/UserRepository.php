<?php

declare(strict_types=1);

namespace Infrastructure\User\Persistence\Repositories;

use Application\User\Data\UserData;
use Domain\User\Entities\User;
use Domain\User\Repositories\UserRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

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

    public function sendResetPasswordEmail(string $email): bool
    {
        $response = Password::sendResetLink(['email' => $email]);

        return $response == Password::RESET_LINK_SENT;
    }

    public function resetPassword(array $data): bool
    {
        $response = Password::reset(
            [
                'email' => $data['email'],
                'password' => $data['password'],
                'password_confirmation' => $data['password_confirmation'],
                'token' => $data['token']
            ],
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );
        
        return $response == Password::PASSWORD_RESET;
    }
}

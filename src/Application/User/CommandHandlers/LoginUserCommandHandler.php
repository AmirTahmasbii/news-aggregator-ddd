<?php

namespace Application\User\CommandHandlers;

use Application\Bus\CommandHandler;
use Application\User\Commands\LoginUserCommand;
use Domain\User\Exceptions\InvalidCredentialsException;
use Domain\User\Repositories\UserRepositoryContract;

class LoginUserCommandHandler extends CommandHandler
{
    private $userRepository;

    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(LoginUserCommand $command): string
    {
        $token = $this->userRepository->login($command->email, $command->password);

        if ($token === null) {
            throw new InvalidCredentialsException();
        }

        return $token;
    }
}

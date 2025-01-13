<?php
namespace Application\User\CommandHandlers;

use Application\Bus\CommandHandler;
use Application\User\Commands\LogoutUserCommand;
use Domain\User\Repositories\UserRepositoryContract;

class LogoutUserCommandHandler extends CommandHandler
{

    public function __construct(private UserRepositoryContract $userRepository)
    {
    }

    public function handle(LogoutUserCommand $command): void
    {
        $this->userRepository->logout($command->user);
    }
}
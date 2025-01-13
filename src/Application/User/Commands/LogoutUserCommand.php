<?php
namespace Application\User\Commands;

use Application\Bus\Command;
use Domain\User\Entities\User;

class LogoutUserCommand extends Command
{
    public function __construct(
        public User $user,
    ) {}
}
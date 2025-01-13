<?php

namespace Application\User\Commands;

use Application\Bus\Command;

class LoginUserCommand extends Command
{
    public function __construct(
        public string $email,
        public string $password,
    ) {}
}

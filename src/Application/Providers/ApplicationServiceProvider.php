<?php

declare(strict_types=1);

namespace Application\Providers;

use Application\Article\Contracts\ArticleServiceContract;
use Application\Article\Services\ArticleService;
use Application\Bus\Contracts\CommandBusContract;
use Application\Bus\Contracts\QueryBusContract;
use Application\Bus\IlluminateCommandBus;
use Application\Bus\IlluminateQueryBus;
use Application\User\CommandHandlers\CreateUserCommandHandler;
use Application\User\CommandHandlers\LoginUserCommandHandler;
use Application\User\CommandHandlers\LogoutUserCommandHandler;
use Application\User\Commands\CreateUserCommand;
use Application\User\Commands\LoginUserCommand;
use Application\User\Commands\LogoutUserCommand;
use Application\User\Contracts\UserServiceContract;
use Application\User\Queries\GetUserByEmailQuery;
use Application\User\Queries\GetUserByEmailQueryHandler;
use Application\User\Services\UserService;
use Illuminate\Support\ServiceProvider;

class ApplicationServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [];

    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        CommandBusContract::class => IlluminateCommandBus::class,
        QueryBusContract::class => IlluminateQueryBus::class,
        UserServiceContract::class => UserService::class,
        ArticleServiceContract::class => ArticleService::class,
    ];

    public function register(): void
    {
        // $this->registerSingletons();

    }

    public function boot(): void
    {
        $this->registerCommandHandlers();
        $this->registerQueryHandlers();
    }

    protected function registerCommandHandlers(): void
    {
        $commandBus = app(CommandBusContract::class);
        $commandBus->register([
            CreateUserCommand::class => CreateUserCommandHandler::class,
            LoginUserCommand::class => LoginUserCommandHandler::class,
            LogoutUserCommand::class => LogoutUserCommandHandler::class,
        ]);
    }

    protected function registerQueryHandlers(): void
    {
        $queryBus = app(QueryBusContract::class);
        $queryBus->register([
            GetUserByEmailQuery::class => GetUserByEmailQueryHandler::class,
        ]);
    }
}

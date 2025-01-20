<?php

declare(strict_types=1);

namespace Infrastructure\Providers;

use Domain\Article\Repositories\ArticleRepositoryContract;
use Domain\Source\Repositories\SourceRepositoryContract;
use Domain\User\Repositories\UserRepositoryContract;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Article\Persistence\Repositories\ArticleRepository;
use Infrastructure\Source\Persistence\Repositories\SourceRepository;
use Infrastructure\User\Persistence\Repositories\UserRepository;

class InfrastructureServiceProvider extends ServiceProvider
{
    public $singletons = [
        UserRepositoryContract::class => UserRepository::class,
        ArticleRepositoryContract::class => ArticleRepository::class,
        SourceRepositoryContract::class => SourceRepository::class,
    ];

    public function register(): void {}

    public function boot(): void
    {
        // Infrastructure-specific bootstrapping
    }


    /**
     * Register the bindings specified in the singletons array.
     */
    protected function registerSingletons(): void
    {
        foreach ($this->singletons as $interface => $implementation) {
            $this->app->singleton($interface, $implementation);
        }
    }
}

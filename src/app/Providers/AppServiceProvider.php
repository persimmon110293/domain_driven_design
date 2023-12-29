<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\IUserRepository;
use App\Http\Repositories\UserRepository;
use App\Http\ApplicationService\CreateUserAppService;
use App\Http\ApplicationService\ICreateUserAppService;
use App\Http\ApplicationService\GetUserAppService;
use App\Http\ApplicationService\IGetUserAppService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * binding all container.
     */
    public $bindings = [
        IUserRepository::class => UserRepository::class,
        ICreateUserAppService::class => CreateUserAppService::class,
        IGetUserAppService::class => GetUserAppService::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\IUserRepository;
use App\Http\Repositories\UserRepository;
use App\Http\ApplicationService\CreateUserAppService;
use App\Http\ApplicationService\ICreateUserAppService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * binding all container.
     */
    public $bindings = [
        IUserRepository::class => UserRepository::class,
        ICreateUserAppService::class => CreateUserAppService::class,
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

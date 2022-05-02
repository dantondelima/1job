<?php

namespace App\Providers;

use App\Models\Admin;
use App\Repositories\AdminRepository;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Services\AdminService;
use App\Services\Interfaces\AdminServiceInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Admin
        $this->app->bind(AdminServiceInterface::class, function ($app) {
            return new AdminService($app->make(AdminRepositoryInterface::class));
        });
        $this->app->bind(AdminRepositoryInterface::class, function ($app) {
            return new AdminRepository(new Admin());
        });
    }
}

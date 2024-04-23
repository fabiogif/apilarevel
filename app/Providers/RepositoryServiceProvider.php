<?php

namespace App\Providers;

use App\Interfaces\PlanRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\TenantRepositoryInterface;
use App\Repositories\PlanRepository;
use App\Repositories\ProductRepository;
use App\Repositories\TenantRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(TenantRepositoryInterface::class, TenantRepository::class);
        $this->app->bind(PlanRepositoryInterface::class, PlanRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

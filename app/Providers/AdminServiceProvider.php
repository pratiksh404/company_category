<?php

namespace App\Providers;

use App\Contracts\CategoryRepositoryInterface;
use App\Contracts\CompanyRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\CompanyRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /* Repository Interface Binding */
        $this->repos();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Registering Blade Directives
        Paginator::useBootstrap();
    }

    // Repository Interface Binding
    protected function repos()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
    }
}

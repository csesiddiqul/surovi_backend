<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use App\Models\Menu;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        if (!$this->app->runningInConsole()) {
            view()->composer('inc.header', function ($view) {
                $menus = (new Menu())->getMenusAll(true);
                $view->with('menus', $menus);
            });
        }
    }
}

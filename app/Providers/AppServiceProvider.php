<?php

namespace App\Providers;

use App\Models\UpdateNews;
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
            view()->composer('*', function ($view) {
                $menus = (new \App\Models\Menu())->getMenusAll(true);

                $updateNewsScroll = \App\Models\UpdateNews::select('id', 'news', 'priority', 'created_at')
                    ->where('status', 1)
                    ->orderBy('priority', 'asc')
                    ->limit(3)
                    ->get();


                $setting = \App\Models\websiteSetting::first();

                $view->with([
                    'menus' => $menus,
                    'updateNewsScroll' => $updateNewsScroll,
                    'setting' => $setting
                ]);
            });
        }
    }
}

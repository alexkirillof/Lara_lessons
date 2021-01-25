  
<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        $menu = [
        [
            'title' => __('menu.main'),
            'alias' => 'home'
        ],
        [
            'title' => __('menu.news'),
            'alias' => 'news::categories'
        ],
        [
            'title' => __('menu.admin'),
            'alias' => 'admin::news::index'
        ],
    ];
        View::share('menu', $menu);
    }
}

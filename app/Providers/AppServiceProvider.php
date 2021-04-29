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
                'title' =>  __('labels.news'),
                'alias' => 'news::categories'
            ],
            [
                'title' => __('labels.feedback'),
                'alias' => 'feedback::create'
            ],
            [  'title' => __('labels.admin_news'),
                'alias' => 'admin::news::index'
            ],
            [ 'title' => __('labels.admin_categories'),
                'alias' => 'admin::news::indexCategory'
            ],

        ];

        View::share('menu', $menu);
    }
}

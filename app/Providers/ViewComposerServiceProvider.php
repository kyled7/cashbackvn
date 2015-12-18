<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavbar();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composeNavbar()
    {
        view()->composer('includes.navbar', function ($view) {
            $categories = Category::with(['retailers' => function ($query) {
                $query->orderBy('created_at', 'desc')->take(5);
            }])->get()->toArray();

            $view->with('categories', $categories);
        });
    }
}

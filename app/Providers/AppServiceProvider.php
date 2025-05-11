<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;


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
        View::composer('front.*', function ($view) {
            $categories = Category::orderBy('name', 'ASC')->get();
            $view->with('categories', $categories);
        });

        // View::composer('*', function ($view) {
        //     $navCategories = Category::whereIn('slug', ['كتب علم نفس', 'روايات', 'كتب عربيه', 'كتب انجليزية'])->get();
        //     $view->with('navCategories', $navCategories);
        // });
        
    }
}

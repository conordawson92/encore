<?php

namespace App\Providers;

use App\Models\ParentCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CategoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $parentCategories = ParentCategory::with('categories')->get();
            $view->with('parentCategories', $parentCategories);
        });
    }
}

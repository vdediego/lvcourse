<?php

namespace App\Providers;

use App\Http\View\Composers\PostcardComposer;
use App\Http\View\Composers\PostComposer;
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
        View::composer(['partials.postcards.*', 'home'], PostcardComposer::class);
        View::composer(['partials.posts.*', 'home'], PostComposer::class);
    }
}

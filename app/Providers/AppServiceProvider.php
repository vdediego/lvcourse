<?php

namespace App\Providers;

use App\Http\View\Composers\HomeComposer;
use App\Http\View\Composers\PostcardComposer;
use App\Http\View\Composers\PostComposer;
use App\Http\View\Composers\ProfileComposer;
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
        View::composer('partials.postcards.*', PostcardComposer::class);
        View::composer('partials.posts.*', PostComposer::class);

        View::composer('home', HomeComposer::class);

        View::composer('partials.profiles.profiles-grid', ProfileComposer::class);
    }
}

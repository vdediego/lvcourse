<?php

namespace App\Providers;

use App\Http\View\Composers\HomeComposer;
use App\Http\View\Composers\ProfileComposer;
use App\Services\PostcardSendingService;
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
        // Services Registration
        $this->app->singleton('PostcardFacade', function () {
            return new PostcardSendingService(40, 60, 'ES');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View Composers
        View::composer('home', HomeComposer::class);
        View::composer('partials.profiles.profiles-grid', ProfileComposer::class);
    }
}

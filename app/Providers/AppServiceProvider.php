<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserProfileNotif;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Notification::extend('user-profile-notif', function ($app) {
            return $app->make(UserProfileNotif::class);
        });
    }
}

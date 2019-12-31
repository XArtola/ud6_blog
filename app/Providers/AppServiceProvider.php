<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;    // Must Must use
use Illuminate\Support\Facades\Blade;   // Must Must use
use App\User;

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
        //Para crear etiquetas blade personalizadas
        Blade::if('admin', function () {
            $user = User::find(auth()->user()->id);
            return $user->roles()->where('name', 'admin')->count();
        });

        Blade::if('editor', function () {
            $user = User::find(auth()->user()->id);
            return $user->roles()->where('name', 'editor')->count();
        });
    }
}

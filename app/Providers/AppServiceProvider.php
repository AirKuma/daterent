<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use Auth;
use Request;
use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
                view()->composer('*', function($view) {
                $view->with('myprofiledata', Auth::check() ? User::find(Auth::user()->id) : '');
                });

                view()->composer('layouts.partials.navigation', function($view) {
                $view->with('avator_url', Auth::check() ? User::find(Auth::user()->id)->image : '');
                });

                view()->composer('*', function($view) {
                $view->with('user_data', Auth::check() ? User::find(Request::segment(3)) : '');
                });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;
use Schema;
use DB;

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
      View::share('key', 'value');
        Schema::defaultStringLength(191);
        $notifications = DB::table('products')->whereDate('expirydate', '<=', \Carbon\Carbon::today()->addDays(14))->get();
        View::share('notifications',$notifications);

    }
}

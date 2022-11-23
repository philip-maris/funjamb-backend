<?php

namespace App\Providers;

use App\Util\ListUtil\SidebarListUtil;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use SidebarListUtil;
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
        view()->composer(
          "v1.layout.dash-layout",
          function ($view){
//              dd($view);
              $view->with([
                  "sidebar"=>$this->sidebarList
              ]);
          }
        );
        Schema::defaultStringLength(191);
    }
}

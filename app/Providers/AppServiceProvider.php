<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Catalogs;
use Config;

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
		view()->share('image_path', 'http://localhost/vadimtur');
		$constants = config('app.catalogs');
		$catalogs = Catalogs::where('id_catalog', 1)
				->whereIn('id_product', $constants)
               ->orderBy('name', 'desc')
               //->take(10)
               ->get();
        ///$domains = Domain::get();
		
		View::composer('*', function($view) use($catalogs){
		  $view->with('catalogs', $catalogs);
		});
    }
}

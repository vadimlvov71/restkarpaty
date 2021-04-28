<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;
class LanguageSwitcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     
     public function handle($request, Closure $next)
    {
		/*echo "<pre>";
		print_r($request);
		echo "</pre>";*/
		if ($request->locale == 'ua') { // if the route starts with /es/* set locale to ES
           // echo "yes";
        } else if ($request->is('/fr/*')) { // if the route starts with /fr/* set locale to FR
            $locale = 'fr';
           // echo "noooooo";
        }else{
			//echo "noooooo";
		}
        if (Session::has('locale') AND array_key_exists(Session::get('locale'), config('locale.languages'))) {
            App::setLocale(Session::get('locale'));
            //echo "has";
        }
        else { // This is optional as Laravel will automatically set the fallback language if there is none specified
            App::setLocale(Config::get('app.fallback_locale'));
            //echo "hasnot";
            
        }
        //exit;
        return $next($request);
    }
    /* public function handle($request, Closure $next){
		App::setLocale($request->lang);

		return $next($request);
	}*/
	/*public function handle($request, Closure $next)
    {
        App::setLocale(Session::get('locale'));
        return $next($request);
    }*/
    /*
    public function handle($request, Closure $next)
    {
        if(session()->has('locale') && in_array(session()->get('locale'), $this->languages))
        {
            app()->setLocale(session()->get('locale'));
        }
        return $next($request);
    }
    * */
}

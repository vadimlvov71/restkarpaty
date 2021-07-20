<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;
use Session; 

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $breadcrumbs = array();
    public $notInGold = array();
   // public $locale;
    public function __construct()
    {
		$locale = Session::get('locale');
		$this->notInGold = config('constants.notInGold');
		//View::share ('locale', $this->locale );
		//$this->breadcrumbs[] = array('url' => '/', 'text' => "test");
	}
	public function getLocale($request)
    {
		$segments = $request->segments();
		$locale = $segments[0];
		return $locale;
	}
}

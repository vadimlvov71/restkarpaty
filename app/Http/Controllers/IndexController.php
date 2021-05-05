<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App;
use Route;
use Config;
use App\Models\Catalogs;
use Lang;

class IndexController extends Controller
{
	
	public function index(){
		$title = "Index";
		$constants = config('app.catalogs');
		//echo "getLocale:: ".App::getLocale();
		//exit;
		//$products = DB::select('select * from products where id_catalog = ? AND where id_product = ?', ['1', $constants]);
		/*$products = DB::table('products')
            ->select('products.name', 'products.translit', 'products.smallfoto')
            ->where('id_catalog', '1')
            ->whereIn('products.id_product', $constants)
            //->inRandomOrder()
            //->limit(8)
            ->get();*/
		$products = Catalogs::select('products.id_product', 'products.name', 'products.translit', 'products.smallfoto')
            ->where('id_catalog', '1')
            ->whereIn('products.id_product', $constants)
			->get()
		;
		$hotel_types = DB::select('select * from hotel_type where karpaty = ?', ['yes']);
		$dosts = DB::select('select * from dost where id_catalog = ?', ['1']);
		$articles = DB::select('select * from article where id_catalog = ?', ['1']);
		$hotels = DB::select('select * from doma where id_catalog = ? AND sektor = ? AND first = ?', [1, '0', '1']);
		$privates = DB::select('select * from doma where id_catalog = ? AND sektor = ? AND first = ?', [1, '1', '1']);
		$hotels = DB::table('doma')
            ->join('products', 'products.id_product', '=', 'doma.id_product')
            ->select('doma.doma_id', 'doma.hotel_translit', 'doma.name', 'doma.sektor','products.translit', 'products.name as pname')
            ->where('doma.id_catalog', '1')
            ->whereNotIn('gold', $this->notInGold)
            ->inRandomOrder()
            ->limit(8)
            ->get();
		$lang_title = Lang::trans('lang.welcome');
		$breadcrumbs[] = array( 'text' => $lang_title);
		/*echo "<pre>";
		print_r();
		echo "</pre>";*/
		$locale = Session::get('locale');
		
        return view('index', ['title' => $title, 'products' => $products, 'hotel_types' => $hotel_types, 'dosts' => $dosts,
         'articles' => $articles, 'breadcrumbs' => $breadcrumbs, 'locale' => $locale, 'hotels' => $hotels, 'constants' => $constants]);       
    }
    
    public function hello(){
        return 'hello world!';       
    }
}

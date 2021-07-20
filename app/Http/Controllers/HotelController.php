<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App;
use Route;
use Translit;
use App\Models\Hotels;
use App\Models\Dosts;
use Lang;
use App\Helpers\Helper;
class HotelController extends Controller
{
	
	public function __construct(Request $request)
    {
		parent::__construct();
		$get_catalog = $request->route()->parameter('get_catalog');
		$product = DB::table('products')
			->select('name')
			->where('translit', $get_catalog)
			->first()
		;
		
		$hotel_types = DB::select('select * from hotel_type where karpaty = ? ', ['yes']);
		//App::singleton('data', function() { return array('abc' => 1); });
		//App::singleton('product', function($product) { return ($product); });
		$locale = Session::get('locale');
		view()->share('hotel_types', $hotel_types);
        //v
	}
	public function translit(Request $request){
		$translit = $request->route()->parameter('translit');
		//$hotels = DB::select('select doma.doma_id,hotel_translit, name from doma where id_catalog = ?', ['1']);
		/*
		echo "<pre>";
		print_r($hotels);
		echo "</pre>";
		*/
		/*
		foreach ($hotels as $item){
			//$hotelone = Hotels::find($item->doma_id);
			$aaa = Hotels::where('doma_id', $item->doma_id)
			->update(array('hotel_translit' => Translit::encodestring($item->name)));
			
			echo Translit::encodestring($item->name)."<br>";
		}*/
		/*$dosts = DB::select('select id_dost, name from dost where id_catalog = ?', ['1']);
		foreach ($dosts as $item){
			//$hotelone = Hotels::find($item->doma_id);
			$aaa = Dosts::where('id_dost', $item->id_dost)
			->update(array('dost_translit' => Translit::encodestring($item->name)));
			
			//echo Translit::encodestring($item->name)."<br>";
		}
		echo "<pre>";
		print_r($dosts);
		echo "</pre>";
					exit;
					*/
	}
	public function index(Request $request){
		$translit = $request->route()->parameter('translit');
		
		//echo "name:: ".$name;
		//exit;
		$hotel = DB::table('doma')
			->select('*')
			->where('hotel_translit', $translit)
			->first()
		;
		////
		$title = $hotel->name;
		$id_product = $hotel->id_product;
		$hotelPhotos = DB::table('foto')
			->select('*')
			->where('doma_id', $hotel->doma_id)
			->get()
		;
		/////
		$hotelPhotos = DB::table('foto')
			->select('*')
			->where('doma_id', $hotel->doma_id)
			->get()
		;
		$numPhotos = $hotelPhotos->count();
		$rooms = DB::table('room')
			->select('*')
			->where('doma_id', $hotel->doma_id)
			->get()
		;
		/////
		$product = DB::table('products')
		->select('*')
			->where('id_product', $id_product)
			->first()
		;
		//$product = DB::select('select * from products where id_product = ?', [$id_product]);
		//	->first()
		//;
		//////////
		$products = DB::select('select * from products where id_catalog = ?', ['1']);
		$hotel_types = DB::select('select * from hotel_type where karpaty = ?', ['yes']);
		$dosts = DB::select('select * from dost where id_catalog = ?', ['1']);
		$articles = DB::select('select * from article where id_catalog = ?', ['1']);
		$hotels = DB::table('doma')
			->select('doma.name', 'translit', 'sektor', 'doma_id', 'hotel_translit', 'products.name as pname', 'sektor')
			->join('products', 'products.id_product', '=', 'doma.id_product')
			->whereNotIn('gold', $this->notInGold)
			->where('doma.id_product', $id_product)
			//->where($getHotelTypeQuery[0], $getHotelTypeQuery[1])
			->inRandomOrder()
			->get()
		;
		$privates = DB::select('select * from doma where id_catalog = ? AND sektor = ? AND first = ?', [1, '1', '1']);
		$locale = Session::get('locale');
		if($locale == "ua"){
			$title_catalog = Lang::trans('lang.catalogs')[$id_product];
			$title_menu = Lang::trans('lang.catalogs')[$id_product];
		}else{
			$title_catalog = $product->name;
			$title_menu = $product->name;
		}
		$lang_title = Lang::trans('lang.welcome');
		$this->breadcrumbs[] = array('url' => '/', 'text' => $lang_title);
		$this->breadcrumbs[] = array('url' => $product->translit, 'text' => $title_catalog);
		$this->breadcrumbs[] = array('url' => $product->translit.'/'.Helper::getHotelTypeUrl($hotel->sektor), 'text' => Helper::getHotelTypeName($hotel->sektor, $locale));
		$this->breadcrumbs[] = array('text' => $title);

		$locale = Session::get('locale');
        return view('hotel/index', ['title' => $title, 'hotel' => $hotel, 'hotelPhotos' => $hotelPhotos, 'rooms' => $rooms, 'products' => $products, 'product' => $product, 'hotel_types' => $hotel_types, 'dosts' => $dosts,
         'articles' => $articles, 'breadcrumbs' => $this->breadcrumbs, 'locale' => $locale, 'hotels' => $hotels, 'numPhotos' => $numPhotos ]);       
    }
    
    public function hello(){
        return 'hello world!';       
    }
}

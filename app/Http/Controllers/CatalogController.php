<?php

namespace App\Http\Controllers;
use App\Models\Catalogs;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Route;
use Session;
use URL; 

class CatalogController extends Controller
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
		/*echo "<pre>";
		print_r($request);
		echo "</pre>";*/
		$menu_rubrics = Helper::rubricMenu($product->name);
		$hotel_types = DB::select('select * from hotel_type where karpaty = ? ', ['yes']);
		//App::singleton('data', function() { return array('abc' => 1); });
		//App::singleton('product', function($product) { return ($product); });
		$locale = Session::get('locale');
		view()->share('hotel_types', $hotel_types);
        view()->share('menu_rubrics', $menu_rubrics);
    }
    
	public function index(Request $request){
		$get_catalog = $request->route()->parameter('get_catalog');
		$get_locale = $request->route()->parameter('get_locale');
	
		//$product = App::make('product');
		/*echo "<pre>";
		print_r($product);
		echo "</pre>";*/
		//$catalog = DB::select('select * from products where translit = ?', [$get_catalog]);
		$product = DB::table('products')
			->select('*')
			->where('translit', $get_catalog)
			->first()
		;
		//$product = 
		$id_product = $product->id_product;
		/*echo "<pre>";
		print_r($catalog);
		echo "</pre>pre>";*/
		$notInGold = array('0', '5');
		$products = DB::select('select * from products where id_catalog = ?', ['1']);
		$hotels = DB::table('doma')
			->select('doma.name', 'translit', 'sektor', 'doma_id', 'hotel_translit', 'products.name as pname')
			->join('products', 'products.id_product', '=', 'doma.id_product')
			->where('doma.id_product', $id_product)
			->where('doma.sektor', '0')
			->whereNotIn('gold', $this->notInGold)
			//->where($getHotelTypeQuery[0], $getHotelTypeQuery[1])
			->inRandomOrder()
			->get()
		;
		$privates = DB::table('doma')
			->select('doma.name', 'translit', 'sektor', 'doma_id', 'hotel_translit', 'products.name as pname')
			->join('products', 'products.id_product', '=', 'doma.id_product')
			->where('doma.id_product', $id_product)
			->where('doma.sektor', '1')
			->whereNotIn('gold', $notInGold)
			//->where($getHotelTypeQuery[0], $getHotelTypeQuery[1])
			->inRandomOrder()
			->get()
		;
		//$privates = DB::select('select * from doma where id_product = ? AND sektor = ?', [$id_product, '1']);

		$dosts = DB::select('select * from dost where id_product = ? ', [$id_product]);
		$articles = DB::select('select * from article where id_catalog = ?', ['1']);
		$title = "Catalog";
		$locale = $this->getLocale($request);
		$this->breadcrumbs[] = array('text' => $product->name);
		//$data = App::make('data');
        return view('catalog/index', ['title' => $title, 'product' => $product, 'products' => $products, 'dosts' => $dosts, 
        'articles' => $articles, 'hotels' => $hotels, 'privates' => $privates, 'breadcrumbs' => $this->breadcrumbs, 'locale' => $locale]);     
    }
    public function hoteltype(Request $request){
		$get_catalog = $request->route()->parameter('get_catalog');
		$hotel_type = $request->route()->parameter('hotel_type');
		$product = DB::table('products')
			->select('*')
			->where('translit', $get_catalog)
			->first()
		;
		$id_product = $product->id_product;
		$products = DB::select('select * from products where id_product = ?', ['1']);
		if($hotel_type == "hotels"){
			$sektor = "0";
		}else{
			$sektor = "1";
		}
		//$hotels = DB::select("select * from doma where id_product = ? AND sektor = ? AND gold NOT IN('0', '1', '5')", [$id_product, $sektor]);
		$hotels = DB::table('doma')
			->select('doma.name', 'translit', 'sektor', 'doma_id', 'hotel_translit', 'products.name as pname')
			->join('products', 'products.id_product', '=', 'doma.id_product')
			->where('doma.id_product', $id_product)
			->where('doma.sektor', $sektor)
			->whereNotIn('gold', $this->notInGold)
			//->where($getHotelTypeQuery[0], $getHotelTypeQuery[1])
			->inRandomOrder()
			->get()
		;
		
		$dosts = DB::select('select * from dost where id_product = ? ', [$id_product]);
		$articles = DB::select('select * from article where id_catalog = ?', ['1']);
		//
		$locale = $this->getLocale($request);
		$breadcrumbs_name = Helper::localeType($hotel_type, $locale);
		$this->breadcrumbs[] = array('url' => $product->translit, 'text' => $product->name);
		$this->breadcrumbs[] = array( 'text' => $breadcrumbs_name);
        return view('catalog/hotel_type', ['product' => $product, 'products' => $products,  'dosts' => $dosts, 'articles' => $articles,
         'hotels' => $hotels, 'hotel_type' => $hotel_type, 'breadcrumbs' => $this->breadcrumbs, 'locale' => $locale]);      
    }
	public function info(Request $request){
		$get_catalog = $request->route()->parameter('get_catalog');
		$product = DB::table('products')
			->select('*')
			->where('translit', $get_catalog)
			->first()
		;
		$id_product = $product->id_product;
		$products = DB::select('select * from products where id_catalog = ?', ['1']);
		
		$hotels = DB::select('select * from doma where id_product = ? AND sektor = ?', [$id_product, 0]);
		$privates = DB::select('select * from doma where id_product = ? AND sektor = ?', [$id_product, 1]);
		$hotel_types = DB::select('select * from hotel_type where karpaty = ? ', ['yes']);
		$dosts = DB::select('select * from dost where id_product = ? ', [$id_product]);
		$articles = DB::select('select * from article where id_catalog = ?', ['1']);
		/////
		$title = "Info";
		$locale = $this->getLocale($request);
		$this->breadcrumbs[] = array('url' => $product->translit, 'text' => $product->name);
		$this->breadcrumbs[] = array('text' => $title);
        return view('catalog/info', ['title' => $title, 'privates' => $privates, 'product' => $product, 'products' => $products, 'dosts' => $dosts, 'articles' => $articles,
         'hotels' => $hotels, 'breadcrumbs' => $this->breadcrumbs, 'locale' => $locale]);      
    }
    public function dosts(Request $request){
		$get_catalog = $request->route()->parameter('get_catalog');
		$product = DB::table('products')
			->select('*')
			->where('translit', $get_catalog)
			->first()
		;
		$id_product = $product->id_product;
		$products = DB::select('select * from products where id_product = ?', ['1']);
		
		$hotels = DB::select('select * from doma where id_product = ? AND sektor = ?', [$id_product, 0]);
		$privates = DB::select('select * from doma where id_product = ? AND sektor = ?', [$id_product, 1]);
		$hotel_types = DB::select('select * from hotel_type where karpaty = ? ', ['yes']);
		$dosts = DB::select('select * from dost where id_product = ? ', [$id_product]);
		$articles = DB::select('select * from article where id_catalog = ?', ['1']);
		/////
		
		$locale = $this->getLocale($request);
		$breadcrumbs_name = Helper::localeType("dosts", $locale);
		$title = $breadcrumbs_name;
		$this->breadcrumbs[] = array('url' => $product->translit, 'text' => $product->name);
		$this->breadcrumbs[] = array('text' => $title);
        return view('catalog/dosts', ['title' => $title, 'privates' => $privates, 'product' => $product, 'products' => $products, 'dosts' => $dosts, 'articles' => $articles,
         'hotels' => $hotels, 'breadcrumbs' => $this->breadcrumbs, 'locale' => $locale]);      
    }
}

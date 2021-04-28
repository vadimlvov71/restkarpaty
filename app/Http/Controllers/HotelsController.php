<?php

namespace App\Http\Controllers;
use App\Models\Catalogs;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Route;

class HotelsController extends Controller
{
	
	
    
	public function index(Request $request){
		$hotel_type = $request->route()->parameter('hotel_type');
		$id_product = 1;
		//$product = App::make('product');
		echo "<pre>";
		print_r($hotel_type);
		echo "</pre>";
		$getHotelTypeQuery = Helper::getHotelTypeQuery($hotel_type);
		$hotel_types = DB::select('select * from hotel_type where karpaty = ?', ['yes']);
		$hotels = DB::table('doma')
			->select('doma.name', 'translit', 'sektor', 'doma_id')
			->join('products', 'products.id_product', '=', 'doma.id_product')
			->where('doma.id_catalog', '1')
			->where($getHotelTypeQuery[0], $getHotelTypeQuery[1])
			->get()
		;
		//$product = 
		
		/*echo "<pre>";
		print_r($catalog);
		echo "</pre>pre>";*/
		$products = DB::select('select * from products where id_catalog = ?', ['1']);
		//$hotels = DB::select('select * from doma where id_product = ? AND sektor = ?', [$id_product, '0']);
		$privates = DB::select('select * from doma where id_product = ? AND sektor = ?', [$id_product, '1']);
		$hotel_types = DB::select('select * from hotel_type where karpaty = ? ', ['yes']);
		$dosts = DB::select('select * from dost where id_product = ? ', [$id_product]);
		$articles = DB::select('select * from article where id_catalog = ?', ['1']);
		$title = "Catalog";
		//$data = App::make('data');
        return view('hotel_type', ['title' => $title, 'products' => $products, 'hotel_types' => $hotel_types, 'dosts' => $dosts, 'articles' => $articles, 'hotels' => $hotels, 'getHotelTypeQuery' => $getHotelTypeQuery, 'privates' => $privates]);     
    }
   
   
}

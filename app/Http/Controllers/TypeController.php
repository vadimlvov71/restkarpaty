<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App;
use Route;
use Config;
use App\Helpers\Helper;

class TypeController extends Controller
{
	
	public function index(Request $request){
		$constants_catalogs = config('app.catalogs');
		$type = $request->route()->parameter('type');
		$title = "Index";
		$constants = config('app.catalogs');
		//echo "getLocale:: ".App::getLocale();
		//exit;
		//$products = DB::select('select * from products where id_catalog = ? AND where id_product = ?', ['1', $constants]);
		$products = DB::table('products')
            ->select('products.name', 'products.translit')
            ->where('id_catalog', '1')
            ->whereIn('products.id_product', $constants)
            //->inRandomOrder()
            //->limit(8)
            ->get();
		$hotel_type = DB::select('select * from hotel_type where url = ?', [$type]);
		$hotel_types = DB::select('select * from hotel_type where karpaty = ?', ['yes']);
		//$dosts = DB::select('select * from dost where id_catalog = ?', ['1']);
		//$articles = DB::select('select * from article where id_catalog = ?', ['1']);
		//$hotels = DB::select('select * from doma where id_catalog = ? AND sektor = ? AND first = ?', [1, '0', '1']);
		$privates = DB::select('select * from doma where id_catalog = ? AND sektor = ? AND first = ?', [1, '1', '1']);
		$getHotelTypeQuery = Helper::getHotelTypeQuery($type);
		
		$hotels = DB::table('doma')
			->select('doma.name', 'translit', 'sektor', 'doma_id', 'hotel_translit', 'products.name as pname')
			->join('products', 'products.id_product', '=', 'doma.id_product')
			->where('doma.id_catalog', '1')
			->whereNotIn('gold', $this->notInGold)
			->whereIn('doma.id_product', $constants_catalogs)
			->where($getHotelTypeQuery[0], $getHotelTypeQuery[1])
			->inRandomOrder()
			->get()
		;
		$breadcrumbs[] = array('url' => '#', 'text' => 'text');
		/*echo "<pre>";
		print_r($getHotelTypeQuery);
		echo "</pre>";*/
		$locale = Session::get('locale');
		
        return view('type/index', ['title' => $title, 'products' => $products, 'hotel_types' => $hotel_types, 
          'breadcrumbs' => $breadcrumbs, 'locale' => $locale, 'hotels' => $hotels, 'getHotelTypeQuery' => $getHotelTypeQuery, 'hotel_type' => $hotel_type]);       
    }
    
    public function hello(){
        return 'hello world!';       
    }
}

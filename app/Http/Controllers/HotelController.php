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

class HotelController extends Controller
{
	public function translit(Request $request){
		$translit = $request->route()->parameter('translit');
		$hotels = DB::select('select doma.doma_id, name from doma where id_catalog = ?', ['1']);
		echo "<pre>";
		//print_r($hotels);
		echo "</pre>";
		//
		/*foreach ($hotels as $item){
			//$hotelone = Hotels::find($item->doma_id);
			$aaa = Hotels::where('doma_id', $item->doma_id)
			->update(array('hotel_translit' => Translit::encodestring($item->name)));
			
			//echo Translit::encodestring($item->name)."<br>";
		}*/
		$dosts = DB::select('select id_dost, name from dost where id_catalog = ?', ['1']);
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
	}
	public function index(Request $request){
		$translit = $request->route()->parameter('translit');
		$title = "Otel";
		//echo "name:: ".$name;
		//exit;
		$hotel = DB::table('doma')
			->select('*')
			->where('hotel_translit', $translit)
			->first()
		;
		////
		
		
		$products = DB::select('select * from products where id_catalog = ?', ['1']);
		$hotel_types = DB::select('select * from hotel_type where karpaty = ?', ['yes']);
		$dosts = DB::select('select * from dost where id_catalog = ?', ['1']);
		$articles = DB::select('select * from article where id_catalog = ?', ['1']);
		$hotels = DB::select('select * from doma where id_catalog = ? AND sektor = ? AND first = ?', [1, '0', '1']);
		$privates = DB::select('select * from doma where id_catalog = ? AND sektor = ? AND first = ?', [1, '1', '1']);
		$hotels = DB::table('doma')
            ->join('products', 'products.id_product', '=', 'doma.id_product')
            ->select('doma.*', 'products.translit')
            ->where('doma.id_catalog', '1')
            ->inRandomOrder()
            ->limit(4)
            ->get();
		$breadcrumbs[] = array('url' => '#', 'text' => 'text');

		$locale = Session::get('locale');
        return view('hotel/index', ['title' => $title, 'hotel' => $hotel, 'products' => $products, 'hotel_types' => $hotel_types, 'dosts' => $dosts,
         'articles' => $articles, 'breadcrumbs' => $breadcrumbs, 'locale' => $locale, 'hotels' => $hotels]);       
    }
    
    public function hello(){
        return 'hello world!';       
    }
}

<?php
//use App\Http\Controllers\IndexController;
//use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/lang/{language}', 'LanguageController@setLanguage');
Route::get('/translit', 'HotelController@translit');

//Route::get('/', 'IndexController@index');
//Route::get('/{locale}', 'IndexController@index');
//Route::get('/{get_catalog}', 'CatalogController@index');
//Route::get('/type/{hotel_type}', 'HotelsController@index');
//Route::get('/{get_catalog}/{get_catalog_page}', 'CatalogController@hotelType');

Route::get('/', function () {
  return redirect('ru/');
});

Route::get('/', 'LanguageController@setLanguage');
//Route::get('/locale/{language}', 'IndexController@setLanguage');

Route::group([
	'prefix' => '{locale}', 
	'where' => ['locale' => '[a-zA-Z]{2}'], 
	'middleware' => 'language'], function() {
		/*echo "<pre>:: ";
		print_r(App()->getLocale());
		echo "</pre> ";*/
		//exit;
		//if()
			Route::pattern('type', '(hotels|private_sector|pansionati|bazi_otdyha|mini_hoteli|shale|vip_rest|rybalka|korporative|nedorogie-hotels|best-hotels|sauna_banya_hotel)');
			Route::get('/', 'IndexController@index')->name('index');
			Route::get('/{type}', 'TypeController@index')->name('type');
			Route::get('/{get_catalog}', 'CatalogController@index')->name('catalog');
			Route::get('/{get_catalog}/info', 'CatalogController@info');
			Route::get('/{get_catalog}/dosts', 'CatalogController@dosts');
			Route::get('/{get_catalog}/dosts/{translit}', 'DostController@index');
			Route::get('/{get_catalog}/{hotel_type}/{translit}', 'HotelController@index');
			Route::get('/{get_catalog}/{hotel_type}', 'CatalogController@hoteltype');
			
			Auth::routes();
});

/*
Route::get('/{lang}', function ($lang) {
    App::setlocale($lang);
    return view('home');
});
*/
/*Route::get('welcome/{locale}', function ($lang) {
    App::setLocale($lang);

    //
});*/
//Route::get('/', 'LanguageController@languageRoute');
//Route::get('lang/change', 'LangController@change')->name('changeLang');

//Route::get('/', 'HelloWorldController@hello');
//Route::get('/', 'IndexController@index');
//Route::get('/hello', 'HomeController@index');
//Route::get('/',[IndexController::class, 'index']);
/*
Route::get('/', function () {
    return view('index');
});*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
Route::get('/{locale}',function($lang){
       \Session::put('locale',$lang);
       return redirect()->back();   
});
*/

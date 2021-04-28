<?php

namespace App\Http\Controllers;


class ProductsController extends Controller
{
    public function index(){
		$products = DB::select('select * from products where id_catalog = ?', ['1']);
		$hotel_types = DB::select('select * from hotel_type where karpaty = ?', ['yes']);
		$dosts = DB::select('select * from dost where id_catalog = ?', ['1']);
		$articles = DB::select('select * from article where id_catalog = ?', ['1']);
        return view('index', ['products' => $products, 'hotel_types' => $hotel_types, 'dosts' => $dosts, 'articles' => $articles]);
        //return 'index::::hello world!';       
    }
}

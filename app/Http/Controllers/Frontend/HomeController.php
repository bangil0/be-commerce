<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductsCategory;
use App\Models\TopCategory;
use App\Models\Products;

class HomeController extends Controller
{
    public function index(){
    	$pcs = ProductsCategory::all();
    	$tcs = TopCategory::join('products_category','products_category.id','=','top_category.products_category')->get();
    	$products = Products::where('status','on')->orderBy('id', 'desc')->paginate(9);
    	
    	$data['products'] = $products;
		$data['pcs'] = $pcs;
    	$data['tcs'] = $tcs;
    	return view('frontend.index',$data);
    }
}

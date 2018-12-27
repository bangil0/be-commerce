<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\ProductsCategory;

class ProductsCategoryController extends Controller
{
    public function index($slug){
    	$category = ProductsCategory::where('name',$slug)->get();
    	$categorys = ProductsCategory::all();
        $products = Products::where('id_products_category','=',$category[0]->id)->where('status','on')->paginate(9);
    	$cp = Products::where('id_products_category','=',$category[0]->id)->where('status','on')->get();
    	
        $data['products'] = $products;
		$data['cp'] = $cp;
    	$data['categorys'] = $categorys;
    	$data['slug'] = $slug;
    	return view('frontend.product.products-category',$data);
    }
}

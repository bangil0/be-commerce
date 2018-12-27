<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductsCategory;
use App\Models\Products;

class ShopController extends Controller
{
    public function index(){
    	$categorys = ProductsCategory::all();
        $products = Products::where('status','on')->paginate(9);
    	$cp = Products::all();
    	
        $data['cp'] = $cp;
    	$data['products'] = $products;
    	$data['categorys'] = $categorys;
    	
    	return view('frontend.product.shop',$data);
    }

    public function filter(Request $request){
        if($request->category == 'all'){
        	$categorys = ProductsCategory::all();
        	
            $product_name = $request->product_name;
        	$min = $request->min;
        	$max = $request->max;
        	$products = \DB::table('products')
	        	->when($product_name, function ($query, $product_name) {
                    return $query->where('name','like','%'.$product_name.'%');
                })
                ->when($min, function ($query, $min) {
	                return $query->where('price','>=',$min);
	            })
	            ->when($max, function ($query, $max) {
	                return $query->where('price','<=',$max);
	            })
        		->paginate(9);

            $cp = \DB::table('products')
                ->when($product_name, function ($query, $product_name) {
                    return $query->where('name','like','%'.$product_name.'%');
                })
                ->when($min, function ($query, $min) {
                    return $query->where('price','>=',$min);
                })
                ->when($max, function ($query, $max) {
                    return $query->where('price','<=',$max);
                })
                ->get();
        	
            $data['cp'] = $cp;
        	$data['products'] = $products;
	    	$data['categorys'] = $categorys;
	    	
	    	return view('frontend.product.shop',$data);
        }else{
        	$categorys = ProductsCategory::all();

            $product_name = $request->product_name;
            $category = $request->category;
        	$min = $request->min;
        	$max = $request->max;
        	$products = \DB::table('products')
                ->when($product_name, function ($query, $product_name) {
                    return $query->where('name','like','%'.$product_name.'%');
                })
	        	->when($category, function ($query, $category) {
	                return $query->where('id_products_category',$category);
	            })
	        	->when($min, function ($query, $min) {
	                return $query->where('price','>=',$min);
	            })
	            ->when($max, function ($query, $max) {
	                return $query->where('price','<=',$max);
	            })
	            ->paginate(9);

            $cp = \DB::table('products')
                ->when($product_name, function ($query, $product_name) {
                    return $query->where('name','like','%'.$product_name.'%');
                })
                ->when($category, function ($query, $category) {
                    return $query->where('id_products_category',$category);
                })
                ->when($min, function ($query, $min) {
                    return $query->where('price','>=',$min);
                })
                ->when($max, function ($query, $max) {
                    return $query->where('price','<=',$max);
                })
                ->get();

            $data['cp'] = $cp;
			$data['products'] = $products;
	    	$data['categorys'] = $categorys;
	    }
	}

    public function search(Request $request){
        $categorys = ProductsCategory::all();
        $product = Products::where('name','like','%'.$request->search.'%')->paginate(9);
        $cp = Products::where('name','like','%'.$request->search.'%')->get();
        if(!empty($product)){
            $data['cp'] = $cp;
            $data['products'] = $product;
            $data['categorys'] = $categorys;
            return view('frontend.product.shop',$data);
        }else{
            return abort(404);
        }
    }
}

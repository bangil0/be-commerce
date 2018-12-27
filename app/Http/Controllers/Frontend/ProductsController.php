<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\ProductsCategory;
class ProductsController extends Controller
{
    public function index($slug){
    	$product = Products::where('slug',$slug)->first();
    	$product_images = \DB::table('products_image')->where('id_products',$product->id)->get();
    	$category = ProductsCategory::where('id',$product->id_products_category)->first();
    	$data['product'] = $product;
    	$data['product_images'] = $product_images;
    	$data['category'] = $category;
    	return view('frontend.product.products',$data);
    }
}

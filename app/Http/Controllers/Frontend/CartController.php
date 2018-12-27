<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;

class CartController extends Controller
{
    public function submit(Request $request){
    	if(!empty(session("id"))){
    		$carts = new Cart;
    		$carts->id_customers = $request->id_customers;
    		$carts->id_products = $request->id_products;
    		$carts->created_at = now();
			$carts->save();
			return redirect($request->url);
		} else {
    		return redirect('login')->withErrors(['Anda Belum Login']);;
    	}
    }

    public function delete(Request $request){
        Cart::where('id',$request->id)->delete();
        return redirect($request->url);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\Coupons;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use Redirect;
class CheckoutController extends Controller
{
    public function index(){
    	if(!empty(session("id"))) {
    		$customers = Customer::where('id',session("id"))->first();
    		$carts = Cart::join('products','products.id','=','carts.id_products')->where('id_customers',session("id"))->get();
    		$data['customers'] = $customers;
    		$data['carts'] = $carts;
    		return view('frontend.order.checkout',$data);
        }else{
            return redirect('login')->withErrors(['Anda Belum Login']);
        }
    }

    public function coupons(Request $request){
    	$now = date('Y-m-d',strtotime(now()));
    	$coupons = Coupons::where('code',$request->code)->where('id_product_category',$request->category)
    	->where('start_date', '<=', $now)
    	->where('end_date', '>=', $now)
    	->first();
    	if(!empty($coupons)){
    		$customers = Customer::where('id',session("id"))->first();
    		$carts = Cart::join('products','products.id','=','carts.id_products')->where('id_customers',session("id"))->get();
    		$data['customers'] = $customers;
    		$data['carts'] = $carts;
    		$data['coupons'] = $coupons;
    		return view('frontend.order.checkout',$data);
		}else{
			$customers = Customer::where('id',session("id"))->first();
    		$carts = Cart::join('products','products.id','=','carts.id_products')->where('id_customers',session("id"))->get();
    		$data['customers'] = $customers;
    		$data['carts'] = $carts;
			return view('frontend.order.checkout',$data)->withErrors(['Kupon tidak tersedia']);
		}
    }

    public function order(Request $request){
        if($request->shipping == 0){
            return Redirect::back()->withErrors(['', 'Metode Pengiriman Belum ditentukan']);
        }
        $id = session('id');
    	$order_date = date('Y-m-d',strtotime(now()));
    	
    	$mid = date('Ym',strtotime(now()));

    	//order-no
    	$orders = new Order;
        $orders->id_customers = session('id');
        
        $coupons =Coupons::where('code',$request->code_coupon)->first();
        $orders->code_coupon = $coupons->id;

        $ol= Order::orderBy('id', 'desc')->first();
        $lastids= $ol->id+1;
        $order_no = 'invoice-'.$mid.'-'.$lastids;
        $orders->kurir=$request->ship_by;
        $orders->order_no = $order_no;
        $orders->id_order_statuses = 1;
        $orders->order_date = $order_date;
        $orders->total_products = $request->subtotal;
        $orders->discounts = $request->amount_discount;
        $orders->shipping = $request->shipping;
        $orders->payment = $request->payment;
        $orders->grand_total = $request->grand_total;
        $orders->save();

        $lastid= $ol->id+1;
        $order_no = 'Orders/'.$mid.'/'.$lastid;

        foreach($request->qty as $i => $qt) {
            $orders_detail = new OrderDetail;
            $orders_detail->id_orders = $lastid;
            $orders_detail->qty = $request->qty[$i];
            $orders_detail->id_products = $request->id_products[$i];
            
            $p = Products::where('id',$request->id_products[$i])->first();
            $subtotal = $subtotal + $p->price;
            $orders_detail->price = $p->price;
            $orders_detail->subtotal = $subtotal;
            $orders_detail->save();
        }

        Cart::where('id_customers',session('id'))->delete();
        return redirect('/order-success');
    }
}

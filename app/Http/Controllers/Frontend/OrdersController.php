<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use RajaOngkir;

class OrdersController extends Controller
{
    public function success(Request $request){
    	$order = Order::where("id_customers",session('id'))->latest()->first();
    	$data['order'] = $order;
    	return view('frontend.order.order-success',$data);
    }

    public function invoice($slug){
    	$order = Order::
        leftjoin('orders_detail','orders_detail.id_orders','=','orders.id')
    	->leftjoin('products','products.id','=','orders_detail.id_products')
    	->select(
    		'orders.*',
            'orders.id_customers',
            'orders.total_products',
            'products.name as product_name',
    		'orders_detail.id_products',
    		'orders_detail.qty',
    		'orders_detail.subtotal',
    		'orders_detail.price'
    	)
    	->where("order_no",$slug)->latest()->get();

        $customer = Customer::where('customers.id',$order[0]->id_customers)
        ->leftjoin('cities','cities.id','=','customers.cities_id')
        ->leftjoin('provinces','provinces.id','=','customers.province_id')
        ->select(
            'customers.*',
            'cities.city_name as city_name',
            'provinces.province as province_name'
        )
        ->first();
        
        $data['order'] = $order;
        $data['customer'] = $customer;
    	return view('frontend.order.invoices',$data);
    }

    public function shipping_cost(Request $request){
        $kota_tujuan = $request->get('id_kota');
        $kurir = $request->get('kurir');
        $kota_asal = \DB::table('origin_shipping')->where('status','On')->first();
        $data = RajaOngkir::Cost([
            'origin'        => $kota_asal->cities_id, // id kota asal
            'destination'   => $kota_tujuan, // id kota tujuan
            'weight'        => 1000, // berat satuan gram
            'courier'       => $kurir, // kode kurir pengantar ( jne / tiki / pos )
        ])->get();
        return[
            'response' => $data
        ];
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer; 
use Session;

class LoginController extends Controller
{
    public function index(){
    	return view('frontend.login');
    }

    public function myAccount(){
    	if(!empty(session("email"))){
            return view('frontend.myaccount');
        }else{
            return redirect('login')->withErrors(['Anda Belum Login']);;
        }
    }

    public function logout(){
        Session::flush();
        return redirect('login');
    }

    public function authUser(Request $request){
		$credentials = $request->only('email', 'password');

		if (auth()->guard('customer')->attempt($credentials)) {
			
            $customers = Customer::where('email','=',$request->email)->first();
            session([
				"id" => $customers->id,
				"name" => $customers->name,
				"email" => $customers->email
			]);
			return redirect('my-account');
		} else {
			return redirect('login')->withErrors(['Wrong Username or Password']);
		}
    }

    public function register(){
        return view('frontend.register');
    }

    public function storeregister(Request $request){
        $all_customer = Customer::all();
        foreach($all_customer as $customerx){
            if($request->email == $customerx->email){
                return redirect('register')->withErrors(['Email telah digunakan']);
            }
        }


        $customers = new Customer;
        $customers->name = $request->nama_lengkap;
        $customers->email = $request->email;
        $customers->gender = $request->gender;
        $customers->password = bcrypt($request->password);
        $customers->save();
        return redirect('register-success');
    }

    public function registersuccess(){
        return view('frontend.register-success');
    }

    public function editaccount(){
        $customer = Customer::where('id',session('id'))->first();
        $provinces = \DB::table('provinces')->get();
        $cities = \DB::table('cities')->get();
        $data['customer'] = $customer;
        $data['provinces'] = $provinces;
        $data['cities'] = $cities;
        return view('frontend.edit-account',$data);
    }

    public function storeedit(Request $request){
        $customer = Customer::find(session('id'));
        $customer->name = $request->nama_lengkap;
        $customer->email = $request->email;
        $customer->gender = $request->gender;
        $customer->nomor_hp = $request->nomor_hp;
        $customer->province_id = $request->province;
        $customer->cities_id = $request->city;
        $customer->alamat = $request->alamat;
        $customer->kode_pos = $request->kode_pos;
        $customer->save();
        return redirect('my-account');
    }
}

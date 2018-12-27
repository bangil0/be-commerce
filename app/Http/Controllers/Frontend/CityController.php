<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function getJson(Request $request){
    	$id_provinsi = $request->get('id_provinsi');
    	$kota = \DB::table('cities')->where('province_id',$id_provinsi)->get();
    	return[
    		'respon_kota' => $kota
    	];
    }
}

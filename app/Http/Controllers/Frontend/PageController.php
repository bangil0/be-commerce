<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function index(){
    	return view('frontend.page');
    }

    public function slug($slug){
    	$data = Page::where('slug',$slug)->first();
    	$data['data'] = $data;
    	return view('frontend.page',$data);
    }
}

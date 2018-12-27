<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductsCategory;

class ContactController extends Controller
{
    public function index(){
    	return view('frontend.contact');
    }
}

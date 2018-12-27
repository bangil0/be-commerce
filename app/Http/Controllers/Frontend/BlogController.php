<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
class BlogController extends Controller
{
    public function index(){
    	$blogs = Blog::paginate(6);
    	$data['blogs'] = $blogs;
    	return view('frontend.blog.blog',$data);
    }

    public function slug($slug){
    	$data = Blog::where('slug',$slug)->first();
    	$data['data'] = $data;
    	return view('frontend.blog.blog-post',$data);
    }
}

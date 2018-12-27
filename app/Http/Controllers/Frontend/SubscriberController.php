<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function submit(Request $request){
    	$subscriber = new Subscriber;
    	$subscriber->email = $request->mail;
    	$subscriber->save();
		
		return redirect('/')->withErrors(['Email has been submitted']);
    }
}

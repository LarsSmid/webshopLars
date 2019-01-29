<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //

    public function index(){
        $user = Auth::user();
    	$orders = Orders::where('user_id', $user['id'])->get();
    	return view('orders')->with('orders', $orders);
    }

}

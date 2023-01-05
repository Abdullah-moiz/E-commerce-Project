<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\Order;

class UserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id',Auth::id())->get();
        return view('frontend.orders.index', compact('orders'));
    }

    public function viewOrder($id)
    {
        $order = Order::where('id' , $id)->where('user_id',Auth::id())->first();
        return view('frontend.orders.view', compact('order'));
    }


   
}

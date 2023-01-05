<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\support\Facades\Auth;


class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id  = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            $user  = Auth::user();
            if($user->hasVerifiedEmail())
            {
                $product_check = Product::where('id',$product_id)->first();
                if($product_check)
                {
                    if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                    {   
                       return response()->json(['status'=> $product_check->name." Already In Cart"]);
                    }
                    else
                    {
                        $cartItem = new Cart();
                        $cartItem->prod_id = $product_id;
                        $cartItem->user_id = Auth::id();
                        $cartItem->prod_qty = $product_qty;
                        $cartItem->save();
                        return response()->json(['status' => $product_check->name." Added to Cart"]);
                    }
                }
            }
            else
            {
                return response()->json(['status' => "Please Verify you Email"]);
            }
        }
        else
        {
            return response()->json(['status' => "Please Login First..."]);
        }
    }
    public function viewCart()
    {
        $cartItem = Cart::where('user_id' , Auth::id())->get();
        return view("frontend.cart", compact('cartItem'));
    }
    public function deleteProduct(Request $request)
    {
        if(Auth::check())
        {
            $user  = Auth::user;
            if($user->hasVerifiedEmail())
            {
                $prod_id  = $request->input('prod_id');
                if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
                {
                    $cartItem =Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                    $cartItem->delete();
                    return response()->json(['status'=>"Product Deleted successfully"]);
                }
            }
            else
            {
                return response()->json(['status' => "Please Verify Your Email"]);
            }
        }
        else
        {
            return response()->json(['status' => "Please Login First..."]);
        }
    }

    public function updateCart(Request $request)
    {
        $prod_id  = $request->input('prod_id');
        $product_qty  = $request->input('prod_qty');
        if(Auth::check())
        {
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                $cart = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status' => "Quantity Updated"]);
            }

        }
        else
        {
            return response()->json(['status' => "Please Login First..."]);
        }
    }
}

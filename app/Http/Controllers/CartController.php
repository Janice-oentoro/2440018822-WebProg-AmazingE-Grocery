<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewCart() {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('cart', compact('cartitems'));
    }

    public function cartAdd(Request $request) {
        $cart = new Cart();
        $cart->user_id = $request->user_id;
        $cart->product_id = $request->product_id;
        $cart->product_price = $request->product_price;
        $cart->save();

        return redirect('cart');    
    }

    public function destroyItem($id)
    {
        Cart::destroy($id);
        return redirect('cart');
    }

    public function transaction() {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        return view('success');
    }
}

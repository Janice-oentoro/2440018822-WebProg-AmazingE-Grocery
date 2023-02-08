<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('home', compact('products'));
    }

    public function detail($id) {
        $product = Product::findOrFail($id);
        return view('detail', compact('product'));
    }

    public function editUser($id){
        $user = User::find($id);
        return view('profile', compact('user'));
    }

    public function update1(Request $request, $id){
        $image = $request->file('image');
        $imageName = Hash::make($image);
        Storage::putFileAs('public/user', $image, $imageName);
        
        User::where('id', $id)
            ->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'gender_id' => $request->gender_id,
                'email' => $request->email,
                'password' => Hash::make($request['password']),
                'image' => $imageName
            ]);

        return redirect('saved');
    }

    public function exit() {
        Auth::logout();
        return view('logout');
    }
}

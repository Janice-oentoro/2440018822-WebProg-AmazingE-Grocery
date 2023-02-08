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

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminView(){
        $users = User::all();
        return view('adminmain', compact('users'));
    }

    public function editRole($id){
        $user = User::find($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)
            ->update([
                'role' => $request->is_admin,
            ]);

        return redirect('adminmain');
    }

    public function destroyItem($id)
    {
        User::destroy($id);
        return redirect('adminmain');
    }
}

<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }

    public function show()
    {
        $user = auth()->user();
        return view('front.profile.index', compact('user'));
    }

    public function reset_password(Request $request)
    {
        $request->validate([
            'password'=>'required|confirmed|min:8'
        ]);

        $user = auth()->user()->update([
            'password'=>bcrypt($request->password)
        ]);

        return back()->with('success','password updated');
    }
}

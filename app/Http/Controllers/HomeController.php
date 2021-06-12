<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.home');
    }

//    public function test()
//    {
//        $user=User::get();
//        return $user->hasRole('user');
//    }
//    public function test()
//    {
//        return view('front.car.view_car');
//    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Checkup;
use App\Models\Image;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;

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
     * @return Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function test(){

       return  $checkup = Checkup::with('car', 'images_checkup')->where('id', 12)->first();

    }

}

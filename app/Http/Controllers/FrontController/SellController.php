<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserOrderRequest;
use App\Models\Brand;
use App\Models\Model_Car;
use App\UserOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellController extends Controller
{

    public function create()
    {
        $brands = Brand::active()->get();

        return view('front.car.sell.create', compact('brands'));

    }


    /*test coed dynamic select*/
    public function myform(Request $request)
    {
        $brands = DB::table("brands")->get();
        return view('front.car.sell.test', compact('brands'));
    }

    /* methode ajax dynamic select*/
    public function myformAjax(Request $request)
    {
        $brand_id = $request->brand_id;
        $models_car = Model_Car::where('brand_id', $brand_id)->get();
        return response()->json([
            'models_car' => $models_car
        ]);
    }

    public function store(UserOrderRequest $request)
    {
        UserOrder::create($request->except('_token'));

        return back()->with('success', 'Request sent successfully');
    }
}

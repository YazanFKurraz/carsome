<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function index(Request $request)
    {
        $cars=Car::with('brand','model')->where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhereHas('brand', function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->search . '%');
                    });
            });
        })->get();
        return view('front.car.index',compact('cars'));
    }

    public function show(Car $car)
    {
        return view('front.car.car_details',compact('car'));
    }

}

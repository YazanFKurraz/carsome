<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarDetailsRequest;
use App\Http\Requests\CarRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Image;
use App\Models\Model_Car;
use App\Notifications\AddCarByUser;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;

class CarController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:delete-car')->only('destroy');
        $this->middleware('permission:notifications')->only('notificationList');
    }

    public function index()
    {
        if (auth()->user()->hasRole(['superadministrator', 'administrator'])) {

            $cars = Car::with('model', 'brand')
                ->orderBy('id', 'DESC')
                ->paginate(PAGINATION_COUNT);
            return view('admin.cars.index', compact('cars'));

        } elseif (auth()->user()->hasRole('dealer')) {

            $cars = Car::with('model', 'brand')
                ->where('user_id', auth()->user()->id)
                ->orderBy('id', 'DESC')
                ->paginate(PAGINATION_COUNT);

            return view('admin.cars.index', compact('cars'));
        }

    }

    public function showDetails($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return redirect()->route('admin.cars')->with(['error' => __('Not found car')]);
        }
//        return $car;
        return view('admin.cars.show_details', compact('car'));
    }

    public function create()
    {
        $brands = Brand::active()->get();
        return view('admin.cars.create', compact('brands'));

    }

    /*test coed dynamic select*/
    public function myform(Request $request)
    {
        $brands = DB::table("brands")->get();
        return view('admin.cars.test', compact('brands'));
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

    public function createDetails($id)
    {

        $car = Car::find($id);
        if (!$car) {
            return redirect()->route('admin.cars')->with(['error' => __('Not found car')]);
        }
        return view('admin.cars.create_details', compact('car'));
    }

    public function store(CarRequest $request)
    {
        try {
        //check active
        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);

        //save brand in DB
        $car = Car::create($request->all());

        // condition just user has role dealer and user
        if (auth()->user()->hasRole(['dealer', 'user'])) {
            $user = User::get();
            // get at last create car
            $car = Car::latest()->first();
            //send notifiction and save to details in method to database in class AddCarByUser
            // constractor id car $car
            Notification::send($user, new AddCarByUser($car));
        }


        return redirect()->route('admin.cars')->with(['success' => __('Success Save')]);

        } catch (Exception $ex) {

            return redirect()->route('admin.cars')->with(['error' => __('Erorr')]);

        }

    }

    public function storeDetails(CarDetailsRequest $request)
    {

        try {
            Car::whereId($request->car_id)->update(
                $request->only(
                    ['manufactured', 'fuel_type', 'seat', 'registration_type',
                        'engine_capacity', 'transmission', 'color', 'current_mileage', 'description']
                ));

            //save brand in DB

            return redirect()->route('admin.cars')->with(['success' => __('Success Save')]);

        } catch (Exception $ex) {

            return redirect()->route('admin.cars')->with(['error' => __('Erorr')]);

        }

    }

    public function edit($id)
    {
        $brands = Brand::active()->get();
        $models_car = Model_Car::active()->get();

        $car = Car::find($id);
        if (!$car) {
            return redirect()->route('admin.cars')->with(['error' => __('Not found')]);
        }
        return view('admin.cars.edit', compact('car', 'brands', 'models_car'));
    }

    public function update(CarRequest $request, $id)
    {
        try {
            $car = Car::find($id);
            if (!$car) {
                return redirect()->route('admin.cars')->with(['error' => __('Not found')]);
            }
            //check active
            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            //edit brand in DB
            $car->update($request->all());

            return redirect()->route('admin.cars')->with(['success' => __('Success Save')]);

        } catch (Exception $ex) {

            return redirect()->route('admin.cars')->with(['error' => __('Erorr')]);

        }

    }

    public function destroy($id)
    {

        try {
            $car = Car::find($id);
            if (!$car) {
                return redirect()->route('admin.cars')->with(['error' => __('Not found')]);
            }

            $car->delete();

            return redirect()->route('admin.cars')->with(['success' => __('Success delete')]);

        } catch (Exception $ex) {

            return redirect()->route('admin.cars')->with(['error' => __('Error')]);


        }

    }

    public function showDropzone($id)
    {

        $car = Car::find($id);
//        return $car;
        return view('admin.cars.dropzone', compact('car'));
    }

    public function upload(Request $request, Car $car)
    {
        $file = $request->file('file');
        $filename = uploadImage('car', $file);
        if ($filename) {
            $car->images()->create([
                'path' => $filename
            ]);
            return response()->json([
                'upload_status' => 'success'

            ], 200);
        } else {
            return response()->json([
                'upload_status' => 'failde'

            ], 401);

        }
    }

    public function deleteImage(Image $image)
    {

        try {

            $path = public_path($image->path);
            File::delete($path);
            $image->delete();

            return back()->with(['success' => __('Success delete')]);

        } catch (Exception $ex) {

            return back()->with(['error' => __('Error delete')]);

        }
    }



}

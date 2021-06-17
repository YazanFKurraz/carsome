<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModelRequest;
use App\Models\Brand;
use App\Models\Model_Car;
use Exception;


class ModelController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:delete-model')->only('destroy');
    }


    public function index()
    {

        $models_car = Model_Car::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);

        return view('admin.models.index', compact('models_car'));

    }

    public function create()
    {

        $brands = Brand::active()->get();
        return view('admin.models.create', compact('brands'));
    }

    public function store(ModelRequest $request)
    {
        try {

            //check active
            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            Model_Car::create($request->all());

            return redirect()->route('admin.models');

        } catch (Exception $ex) {

            return redirect()->route('admin.models')->with(['error' => __('Error')]);

        }

    }

    public function edit($id)
    {
        $model_car = Model_Car::find($id);
        $brands = Brand::active()->get();

        return view('admin.models.edit', compact('model_car', 'brands'));
    }

    public function update(ModelRequest $request, $id)
    {
        try {

            //check active
            $model_car = Model_Car::find($id);

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $model_car->update($request->all());

            return redirect()->route('admin.models');
        } catch (Exception $ex) {

            return redirect()->route('admin.models')->with(['error' => __('Error')]);

        }
    }


    public function destroy($id)
    {

        try {
            $model = Model_Car::find($id);
            if (!$model) {
                return redirect()->route('admin.models')->with(['error' => __('Not found')]);
            }

            $model = Model_Car::with('cars')->where('id', $id)->first();

            if ($model->cars->count() == 0) {
                $model->delete();
            } else {
                return redirect()->route('admin.models')->with(['error' => __('Error: cannot delete brand because model existence ')]);
            }

            return redirect()->route('admin.models')->with(['success' => __('Success delete')]);

        } catch (Exception $ex) {

            return redirect()->route('admin.models')->with(['error' => __('Error')]);

        }

    }
}

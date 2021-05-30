<?php

namespace App\Http\Controllers;
use App\Http\Requests\ModelRequest;
use App\Models\Brand;
use App\Models\Model_Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index(){

        $models_car = Model_Car::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);;

        return view('admin.models.index', compact('models_car'));

    }

    public function create(){

        $brands = Brand::active()->get();
        return view('admin.models.create', compact('brands'));
    }

    public function store(ModelRequest $request){

        //check active
        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);

          Model_Car::create($request->all());

        return redirect()->route('admin.models');

    }


    public function edit($id){
        $model_car = Model_Car::find($id);
        $brands = Brand::active()->get();

        return view('admin.models.edit',compact('model_car', 'brands'));
    }

    public function update(ModelRequest $request, $id){
        //check active
        $model_car = Model_Car::find($id);

        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);

        $model_car->update($request->all());

        return redirect()->route('admin.models');
    }

    public function destroy($id){

        $model_brand = Model_Car::find($id);

        $model_brand->delete();

        return redirect()->route('admin.models');

    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Model_Car;
use Illuminate\Http\Request;
use Livewire\Component;

class DynamicList extends Component
{

    public $brands;
    public $car_models;

    public $selectBrand = null;
    public $selectModel = null;
//    public $car_models = null;

    public function mount($selectModel = null)
    {
        $this->brands = Brand::active()->get();
        $this->car_models = collect();
        $this->selectModel = $selectModel;

        if (!is_null($selectModel)) {
            $model = Model_Car::with('brand')->find($selectModel);
            if ($model) {
                $this->car_models = Model_Car::where('brand_id', $model->brand_id)->get();
                $this->selectBrand = $model->brand_id;
            }
        }
    }

    public function render()
    {

        return view('livewire.dynamic-list');

//        return view('livewire.dynamic-list', [
//            'brands' => Brand::active()->get(),
//        ]);
    }

//     must be name methode name first model select
    public function updatedSelectBrand($brand_id){
        $this->car_models = Model_Car::where('brand_id', $brand_id)->get();
    }


}

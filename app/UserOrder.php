<?php

namespace App;

use App\Models\Brand;
use App\Models\Model_Car;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    protected $guarded = [];


    public function user(){
        return $this->belongsTo(UserOrder::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function model()
    {
        return $this->belongsTo(Model_Car::class);
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $guarded = [];

    // It works to display the value in a way that is not in the data base
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function model_car()
    {

        return $this->hasMany(Model_Car::class);
    }

    public function cars(){
        return $this->hasMany(Car::class);
    }

    public function getActive()
    {
        return $this->is_active == 1 ? 'active' : 'not active';
    }

     // get all brand just active
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}

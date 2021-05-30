<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $guarded = [];

    // It works to display the value in a way that is not in the data base
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function model(){
        return $this->belongsTo(Model_Car::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'car_id');
    }

    public function getActive()
    {
        return $this->is_active == 1 ? 'active' : 'not active';
    }

    // get all car just active
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}

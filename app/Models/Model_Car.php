<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Model_Car extends Model
{
    protected $table = 'models';

    protected $guarded = [];
    // It works to display the value in a way that is not in the data base
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class)->withDefault();
    }

    public function cars(){
        return $this->hasMany(Car::class);
    }

    public function getActive()
    {
        return $this->is_active == 1 ? 'active' : 'not active';
    }

    // get all model just active
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }


}

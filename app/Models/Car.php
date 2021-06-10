<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $guarded = [];

    // It works to display the value in a way that is not in the data base
    protected $casts = [
        'is_active' => 'boolean',
        'is_checkup' => 'boolean'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function model()
    {
        return $this->belongsTo(Model_Car::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'car_id');
    }

    public function images_checkup()
    {
        return $this->hasMany(Images_checkups::class);
    }

    public function checkup()
    {
        return $this->hasOne(Checkup::class);
    }

    public function getActive()
    {
        return $this->is_active == 1 ? 'active' : 'not active';
    }

    public function getIsCheckup()
    {
        return $this->is_checkup == 1 ? 'checkup' : 'not checkup';
    }

    // get all car just active
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}

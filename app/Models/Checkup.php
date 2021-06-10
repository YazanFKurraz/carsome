<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    protected $table = 'checkups';

    protected $guarded = [];

    protected $casts = [
        'is_accident' => 'boolean',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function car(){
        return $this->belongsTo(Car::class);
    }

    public function images_checkup()
    {
        return $this->hasMany(Images_checkups::class);
    }
}

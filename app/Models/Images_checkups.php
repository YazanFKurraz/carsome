<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images_checkups extends Model
{
    protected $table = 'images_checkups';

    protected $fillable = ['path', 'car_id', 'checkup_id', 'created_at', 'updated_at'];

    public function cars()
    {
        return $this->belongsTo(Car::class);
    }

    public function checkups()
    {
        return $this->belongsTo(Checkup::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $table  = 'images';

    protected $fillable = ['path', 'car_id', 'created_at', 'updated_at'];


   public function cars(){
       return $this->belongsTo(Car::class);
   }

}

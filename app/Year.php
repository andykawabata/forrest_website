<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    
    protected $guarded = [];

    public function photos(){

        return $this->hasMany(Photo::class);
    }
    
}

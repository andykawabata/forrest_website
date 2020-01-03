<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $guarded = [];


    public function photos(){

        return $this->hasMany(Photo::class);
    }
    
    
    public function years(){

        return $this->belongsToMany(Year::class, 'album_year');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Album;
use App\Photo;

class AlbumController extends Controller
{
    public function show($album_name, $year_name){

        
        //get all years in album
        $album_id= Album::where('name', $album_name)->first()->id;
        $album_years_object_array = Album::find($album_id)->years()->distinct()->pluck('year_name');
        $album_years = [];
        foreach ($album_years_object_array as $year){
            array_push($album_years, $year);
        }
        sort($album_years, SORT_NUMERIC);
        //check to see if album has default year
        if(!in_array($year_name, $album_years)){
            $year_name = end($album_years);
        }
        //array of all images in album
        $file_names = Photo::where('album_name', $album_name)->where('year_name', $year_name)->pluck('file_name');
        
         
        //if $year_name not in $album_years (there are no photos in 2019) -> $year_name = $album_years.pop()
        return view('album')->with(compact('file_names', 'album_years', 'album_name', 'year_name'));

    }

    public function showDefault($album_name){

        $albums = Album::where('name', $album_name)->get();
        $year_name = $albums[0]['default_year_name'];

        
        return $this->show($album_name, $year_name);
    }
}

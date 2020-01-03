<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Photo;
use App\Year;

class ArtController extends Controller
{
    //
    public function index(){

        return view('forrestportal.art');
    }

    public function show($album_name){

        //get all pics in album
    
        $albums = Album::where('name', $album_name)->get();
        $album = $albums[0];
        $album_id = $album['id'];
        $photos = Photo::where('album_id', $album_id)->get();
        $years = Year::all();
        $year_name_with_photos = [];
        $i = 0;
        foreach ($years as $year){
            $pics_this_year = [];
            $year_name = $year['name'];
            $current_year_id = $year['id'];
            foreach($photos as $photo){
                if($photo['album_id'] == $album_id && $photo['year_id'] == $current_year_id){
                    array_push($pics_this_year, $photo['file_name']);
                }
            }
            $year_name_with_photos[$i] = ['year_name' => $year_name,
                                            'file_names' => $pics_this_year];
            $i++;
                                            
        }
      
        return view('forrestportal.displayAlbum')->with(compact('year_name_with_photos', 'album_name'));
    }
}

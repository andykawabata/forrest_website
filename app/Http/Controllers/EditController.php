<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Album;
use App\Year;

class EditController extends Controller
{
    public function index($album_name, $year_name){

        $albums = Album::where('name', $album_name)->get();
        $years = Year::where('name', $year_name)->get();
        $album = $albums[0];
        $year = $years[0];
        
        $album_id = $album['id'];
        $year_id = $year['id'];
        
        $file_names = Photo::where('album_id', $album_id)->where('year_id', $year_id)->get();

      
        return view('forrestportal.edit')->with(compact('file_names','album_name', 'album_id', 'year_name', 'year_id'));

    }

    public function action($album_name, $year_name, $action){

        
        $albums = Album::where('name', $album_name)->get();
        $years = Year::where('name', $year_name)->get();
        $album = $albums[0];
        $year = $years[0];
        $album_id = $album['id'];
        $year_id = $year['id'];
        
        $file_names = Photo::where('album_id', $album_id)->where('year_id', $year_id)->get();
        
        if($action == 'upload'){
            return view('forrestportal.upload', compact('file_names','album_name', 'album_id', 'year_name', 'year_id'));
        }

        if($action == 'delete'){
            
            return view('forrestportal.delete', compact('file_names','album_name', 'album_id', 'year_name', 'year_id'));
        }
    }
}

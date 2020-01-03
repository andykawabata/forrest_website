<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Album;
use App\Year;
use App\Photo;

class PhotoController extends Controller
{
    public function store(Request $request){
        //recives varibles from form upload

        $this->validate($request, [

            'file_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        
        
        //Store Image
        $filenameWithExt = $request->file('file_name')->getClientOriginalName();
        $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('file_name')->getClientOriginalExtension();
        $filenameToStore = $fileName.'_'.time().'.'.$extension;
        $request->file('file_name')->storeAs('public/img/', $filenameToStore);


        
        //get full album and year objects from name
        $file_name = $filenameToStore;
        $album_name = $request['album_name'];
        $year_name = $request['year_name'];

        $albums = Album::where('name', $album_name)->get();
        $years = Year::where('name', $year_name)->get();
        $album = $albums[0];
        $year = $years[0];
        
        
        $album_id = $album['id'];
        $year_id = $year['id'];

        $photo = new Photo();
        
        $photo->file_name = $file_name;
        $photo->album_id= $album_id;
        $photo->year_id = $year_id;
        $photo->album_name= $album_name;
        $photo->year_name = $year_name;
        //get album_id and year_id

        $photo->save();

        //add to pivot table
        $album->years()->attach([$year_id=> ['album_name'=> $album_name,
                                               'year_name' => $year_name]]);
        
                                   
        return redirect()->back()->with('success', 'image uploaded successfully');
    }

    public function delete(Request $request){
        //add check for file and check to make sure it was deleted from storage
        $file_name = $request['file_name'];
        $res = Photo::where('file_name', $file_name)->delete();

        if($res == '1'){
            Storage::delete('/public/img/' . $file_name);
            return redirect()->back()->with('success', 'image was successfully deleted');
        }
        else{
            return redirect()->back()->with('error', 'deletion error!');
        }

        
    
    }
        
    
}

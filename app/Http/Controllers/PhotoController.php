<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Album;
use App\Year;
use App\Photo;

class PhotoController extends Controller
{
    public function store(Request $request){
        //recives varibles from form upload
        //$filenameWithExt = ($request->file('file_names'))[0];
        //return $filenameWithExt;

        $this->validate($request, [

            'file_names' => 'required',
            'file_names.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:600'

        ]);
        $album_name = $request['album_name'];
        $year_name = $request['year_name'];
        $albums = Album::where('name', $album_name)->get();
        $years = Year::where('name', $year_name)->get();
        $album = $albums[0];
        $year = $years[0];

        //Store Image
        for($i = 0; $i < count($request['file_names']); $i++){

            $filenameWithExt = $request->file('file_names')[$i]->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_names')[$i]->getClientOriginalExtension();
            $filenameToStore = $fileName.'_'.time().'.'.$extension;
            $request->file('file_names')[$i]->storeAs('public/img/', $filenameToStore);
        
           
            $file_name = $filenameToStore;
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
        }
                                   
            return redirect()->back()->with('success', 'image uploaded successfully');
    }

    public function delete(Request $request){
        //
        $file_name = $request['file_name'];
        //get info for pivot table;
        $photo = Photo::where('file_name', $file_name)->get()->first();
        $year_name = $photo['year_name'];
        $album_name = $photo['album_name'];
        $year_id = $photo['year_id'];
        $entry = DB::table('album_year')->where('album_name', $album_name)->where('year_name', $year_name)->first();
        $pivot_id = $entry->id;
        
        $res = Photo::where('file_name', $file_name)->delete();

        if($res == '1'){
            Storage::delete('/public/img/' . $file_name);
            
            //delete one row from pivot table
            DB::table('album_year')->where('id', $pivot_id)->delete();

            return redirect()->back()->with('success', 'image was successfully deleted');
        }
        else{
            return redirect()->back()->with('error', 'deletion error!');
        }

        
    
    }
        
    
}

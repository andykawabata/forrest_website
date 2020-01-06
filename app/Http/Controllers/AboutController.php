<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index(){
        //return view('about') with current pic and bio
        $about = About::find(1);
        $file_name = $about['file_name'];
        $p1 = $about['p1'];
        $p2 = $about['p2'];
        $p3 = $about['p3'];

        return view('forrestportal.about')->with(compact('file_name', 'p1', 'p2', 'p3'));

    }

    public function action($action){
        
        //pass action onto view('about')
        //get current paragraphs
        $about = About::find(1);
        $file_name = $about['file_name'];
        $p1 = $about['p1'];
        $p2 = $about['p2'];
        $p3 = $about['p3'];

        return view('forrestportal.about')->with(compact('action', 'p1', 'p2', 'p3'));
        
        
    }

    public function store(Request $request){

        
        $action = $request['action'];

        if($action == 'changeimage'){

            $this->validate($request, [

                'file_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
            //get old file name
            $old_file_name = About::find(1)->value('file_name');

            //Store Image in folder
            $filenameWithExt = $request->file('file_name')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_name')->getClientOriginalExtension();
            $filenameToStore = $fileName.'_'.time().'.'.$extension;
            $request->file('file_name')->storeAs('public/img/', $filenameToStore);

            
            //update database
            $file_name = $filenameToStore;
            About::find(1)->update(['file_name' => $file_name]);

            

            //delete old photo from file
            Storage::delete('/public/img/' . $old_file_name);
                                       
            return redirect()->back()->with('success', 'image uploaded successfully');
            
        }
        else if($action == 'editbio' ){
            $request['p1'] = $request['p1'] == null ? "" : $request['p1'];
            $request['p2'] = $request['p2'] == null ? "" : $request['p2'];
            $request['p3'] = $request['p3'] == null ? "" : $request['p3'];
            
            $this->validate($request, [
                'p1' => 'max:3000',
                'p2' => 'max:3000',
                'p3' => 'max:3000',
            ]);

            $p1 = $request['p1'];
            $p2 = $request['p2'];
            $p3 = $request['p3'];

            About::find(1)->update(['p1' => $p1,
                                    'p2' => $p2,
                                    'p3' => $p3]);
            
            

            return redirect()->back()->with('success', 'bio uploaded successfully');
        }

    }

    public function show(){

        
        $about = About::find(1);

        $file_name = $about['file_name'];
        $p1 = $about['p1'];
        $p2 = $about['p2'];
        $p3 = $about['p3'];


        return view('about')->with(compact('file_name', 'p1', 'p2', 'p3'));
    }

    
}

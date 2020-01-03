@extends('forrestportal.layouts.edit')

@section('content')

    @if(count($errors) > 0) 
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    @if(\Session::has('success'))
        <div class="alert alert-success alert-block">
            <strong>{{\Session::get('success')}}</strong>
        </div>
    @endif
  
    <div class="row mt-5">
        <form action="upload" method="POST"  id="upload_form" enctype="multipart/form-data">
            <div class="form-group">
                <label>Choose Image</label>
                <input type="file" name="file_name">
            </div>
            <div>
                <input type="hidden" name="album_name" value="{{$album_name}}">    
                <input type="hidden" name="year_name" value="{{$year_name}}">    
            </div>
        </form>
    </div>

    <div class="row mt-5">
        @if(count($file_names) > 0)
            @foreach($file_names as $file_name)
                <img src="{{ asset('storage/img/'.$file_name['file_name'])}}" style="height: 100px">
            @endforeach
        @endif
    </div>
    <div class="row">
        <button type="submit" form="upload_form" class="btn btn-primary mt-5">Upload</button>
    </div>


    

@endsection

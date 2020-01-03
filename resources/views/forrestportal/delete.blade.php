@extends('forrestportal.layouts.edit')

@section('content')

   
    @if(\Session::has('success'))
        <div class="alert alert-success alert-block">
            <strong>{{\Session::get('success')}}</strong>
        </div>
    @endif
    @if(\Session::has('error'))
        <div class="alert alert-success alert-block">
            <strong>{{\Session::get('error')}}</strong>
        </div>
    @endif
    
    <form method="post" action="">
        @if(count($file_names) > 0)
        <div class="row mt-5">
            @foreach($file_names as $file_name)
                
                    <img src="{{ asset('storage/img/'.$file_name['file_name'])}}" style="height: 110px">
                    <input type="radio" name="file_name" value="{{$file_name['file_name']}}" class="mr-3">
                
            @endforeach
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary mt-5">Delete</button>
        </div>
        @endif
    </form>

@endsection
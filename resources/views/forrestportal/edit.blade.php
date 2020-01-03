@extends('forrestportal.layouts.edit')
@section('content')
    <div class="container">
        <div class="row">
            @if(count($file_names) > 0)
                @foreach($file_names as $file_name)
                <img src="{{ asset('storage/img/'.$file_name['file_name']) }}" style="height: 100px">
                @endforeach
            @endif
        </div>
    </div>
@endsection
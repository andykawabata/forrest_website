@extends('layouts.app')

@section('content')

    <div id="aboutContent">
        <div id="aboutWrapper">
            <div id="aboutPicture">
                <div id="innerAboutPicture">
                    <img src="{{ asset('storage/img/'.$file_name)}}">
                </div>
            </div>
            <div id="bioWrapper">

                <h1>
                    ABOUT FORREST
                </h1>
                <p>{{$p1}}</p>
                <p>{{$p2}}</p>
                <p>{{$p3}}</p>
            </div>
        </div>
    </div>

@endsection
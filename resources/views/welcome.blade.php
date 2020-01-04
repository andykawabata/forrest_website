@extends('layouts.app')

@section('content')
    <div id="mobileContent">
        <div class="mobile-artist">
            <h1 class="">Forrest Joss</h1>
            <h4 class="">Visual Artist</h4>
        </div>
        <div class="mobile-menu-pic">
            <img src="{{ asset('static-img/deer.jpg') }}">
        </div>
        <div class="mobile-link-container">
            <button class="mobile-button">
                <a href="{{route('album', ['album_name' => 'drawings', 'year_name' => '2019'])}}">VIEW ARTWORK</a>
            </button>
        </div>
    </div>


    <div id="content">
        <div class="flex-container">
            
                <div class="outer-frame">
                    <div class="picture-frame">  
                        <a href="album/printmaking"> 
                            <img src="{{ asset('static-img/prints.jpg')}}"> 
                        </a>
                    </div>
                        <a href="album/prints"> 
                            <span>Printmaking</span>
                        </a>
                </div>
           
                <div class="outer-frame">
                    <a href="album/drawings"> 
                        <div class="picture-frame">
                            <img src="{{ asset('static-img/drawings.jpg')}}"> 
                        </div>
                    </a>
                    <a href="album/drawing"> 
                        <span>Drawings</span>
                    </a>
                </div>
             
                <div class="outer-frame">
                    <a href="album/sculpture"> 
                        <div class="picture-frame">
                            <img src="{{ asset('static-img/sculpture.jpg') }}"> 
                        </div>
                    </a>
                    <a href="album/sculpture"> 
                        <span>Sculpture</span>
                    </a>
                </div>
            
        </div>
    </div>
@endsection
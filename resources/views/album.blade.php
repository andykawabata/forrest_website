@extends('layouts.app')

@section('content')



    <div class="albumInfo">
        <h4 class="left-album" id="prints"><a href="{{route('default_album', ['album_name' => 'prints'])}}">Prints</a></h4>
        <h4 class="center-album" id="drawings"><a href="{{route('default_album', ['album_name' => 'drawings'])}}">Drawings</a></h1>
        <h4 class="right-album" id="sculpture"><a href="{{route('default_album', ['album_name' => 'sculpture'])}}">Sculpture</a></h4>
        <div class="yearList">
            @if(count($album_years) > 0)
                <?php $last_element = end($album_years) ?>
                @foreach($album_years as $year)
                    <h5 id="{{$year}}"><a href="{{route('album', ['album_name' => $album_name, 'year_name' => $year])}}">{{$year}}</a></h5>
                    @if($year != $last_element)
                        <span class="pipe">&nbsp; | &nbsp;</span>
                    @endif
                @endforeach
            @endif
        </div>
    </div>

    <div class="galleryWrapper">
        <div class="slideShowWrapper">
            <div class="slideShow">
                @if(count($file_names) > 0)
                    @foreach($file_names as $file_name)
                    <div class="slide">
                        <img src="{{ asset('storage/img/'.$file_name)}}">
                    </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="simple-nav">
            <span class="slide-control prev-slide">prev</span>
            <span>&nbsp;/&nbsp;</span> 
            <span class="slide-control next-slide">next</span>
        </div>

    </div>

    <script>
    resizeHeight();
    window.addEventListener("resize", function(){resizeHeight();});
            
    function resizeHeight(){
        
        
        let pageHeight = $('body').height();
        let pageWidth = $('body').width();
        let navHeight = $('header').height();
        let titleHeight = $('.albumInfo').height();
        if(pageWidth >= 420){
            $('.galleryWrapper').height(pageHeight - navHeight - titleHeight);
            console.log("resizing height");
        }

    }
    </script>
    <script>
        let pics = document.getElementsByClassName("slide");

        for(let i = 0; i < pics.length; i++){
            pics[i].style.opacity = "0";
        }

        let current = 0;
        pics[current].style.opacity="1"

        function incrament(){
            pics[current].style.opacity ="0";
            (current === pics.length-1) ? current = 0 : current++;
            pics[current].style.opacity="1";
        }

        function deincrament(){
            pics[current].style.opacity ="0";
            (current === 0) ? current = pics.length - 1 : current--;
            pics[current].style.opacity="1";
        }

        /*
        let rightClick = document.getElementById("clickRight");
        let leftClick = document.getElementById("clickLeft");
        rightClick.addEventListener("click", function(){incrament()}, false);
        leftClick.addEventListener("click", function(){deincrament()}, false);
        */
        
        let prev = document.getElementsByClassName("prev-slide")[0];
        let next = document.getElementsByClassName("next-slide")[0];
        next.addEventListener("click", function(){incrament()}, false);
        prev.addEventListener("click", function(){deincrament()}, false);
        
    </script>

    <script>
        //highlight active album and year
        let currentAlbum = '{{$album_name}}';
        let currentYear = '{{$year_name}}';
        console.log(currentAlbum);
        let activeAlbum = document.getElementById(currentAlbum);
        let activeYear = document.getElementById(currentYear);
        activeAlbum.classList.add('active-album');
        activeYear.classList.add('active-year');
    </script>
    <script>
        //make pipes skinnier for mobile view
        let pipes = document.getElementsByClassName('pipe');
        let body = document.getElementsByTagName('body')[0];
        if(body.offsetWidth <420){
            for(let i = 0; i < pipes.length; i++)
                pipes[i].innerHTML ="|";
        }
    </script>


@endsection
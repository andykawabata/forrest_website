<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/mainContent.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/mobileHome.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/albumStyles.css') }}" rel="stylesheet">
    
    
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>
<body>
    @include('includes.nav')
    @yield('content')

    <script>
        /*
        $( document ).ready(function(){
        //Mobile menu display/hide
            $('#menu-toggle').click(function(){
                $('nav').toggleClass('active');
            });
            
            //Submenu onclick dropdown/up
            $('li.sub-menu > a').click(function(){
                
                if (!$('li.sub-menu ul').is(':visible'))
                    $('li.sub-menu ul').slideDown(500);
                else
                    $('li.sub-menu ul').slideUp(500);
            });
        });
        */
</script>

<script>
    let current_url =  window.location.href;
    let parts = current_url.split('/');
    console.log(parts.includes("album"));
    if(parts.includes("album")){
        let work = document.getElementById("work");
        work.classList.add("active-nav");
    }
    else if(parts.includes("about")){
        let work = document.getElementById("about");
        work.classList.add("active-nav");
    }
    else if(parts.includes("contact")){
        let work = document.getElementById("about");
        work.classList.add("active-nav");
    }
</script>
</body>
</html>
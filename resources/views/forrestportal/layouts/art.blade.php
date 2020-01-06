<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <title>Forrest Portal</title>
</head>
<body>
    @include('includes.auth-nav')
        <div class="container">
        <a href="/forrestportal">Main Menu</a>
        <h1>Choose Album</h1>
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/forrestportal/art/drawings" class="nav-link ">Drawings</a></li>
            <li class="nav-item"><a href="/forrestportal/art/prints" class="nav-link">Prints</a></li>
            <li class="nav-item"><a href="/forrestportal/art/sculpture" class="nav-link">Sculpture</a></li>
        </ul>

        @yield('content')
    </div>
@isset($album_name)
    <script>
        //if $album_name == end of hreff link
        let album_name = '{{$album_name}}';
        let current_url =  window.location.href;
        let parts = current_url.split('/');
        let current_page = parts.pop();
        
        let navlinks = $('.nav-link');

        for (let item of navlinks) {
            let current_link = item.href;
            let current_parts = current_link.split('/');
            let current_word = current_parts.pop();
            if(current_word == current_page)
            item.classList.add("active");
        }   
    </script>
@endisset

</body>
</html>


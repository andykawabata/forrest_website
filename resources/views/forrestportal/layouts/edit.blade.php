<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>
<body>
    
    @include('includes.auth-nav')
    <div class="container">
        <div><a href="/forrestportal/art/{{$album_name}}">< Back To Albums</a></div>
        
        <h3>{{$album_name}}</h3>
        <h3>{{$year_name}}</h3>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/forrestportal/art/{{$album_name}}/{{$year_name}}/edit/upload" class="nav-link ">Upload</a></li>
            <li class="nav-item"><a href="/forrestportal/art/{{$album_name}}/{{$year_name}}/edit/delete" class="nav-link">Delete</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Sort</a></li>
        </ul>

        
    
    @yield('content')
    </div>
</body>
</html>
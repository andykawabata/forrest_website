<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    @include('includes.auth-nav')
    <h1>Main Menu</h1>
    <ul>
        <li class="list-inline-item"><a href="/forrestportal/art" >Edit Art</a></li>
        <li class="list-inline-item"><a href="/forrestportal/about" >Edit About</a></li>
        <li class="list-inline-item"><a href="/forrestportal/contact">Edit Contact</a></li>
    </ul>

    @yield('content')
</body>
</html>
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
    <title>Document</title>
</head>
<body>
    
    @include('includes.auth-nav')
    
    
    @isset($file_name)
        {{-- display current about contents and give edit options --}}
        <div class="container">
            <a href="/forrestportal">Main Menu</a>
            <br>
            <h1>About</h1>
            <br>
            <a href="/forrestportal/about/changeimage" class="mr-5">Change Image</a>
            <a href="/forrestportal/about/editbio">Edit Bio</a>
            <br>
            <br>
            <br>
            <img src="{{ asset('storage/img/'.$file_name) }}" style="max-width: 200px">
            <br>
            <br>
            <div style="max-width: 600px">
                <p>{{$p1}}</p>
                <p>{{$p2}}</p>
                <p>{{$p3}}</p>
            </div>
        

        </div>
    @endisset
    

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
    
    @isset($action)
    <div class="container">
        <a href="/forrestportal">Main Menu</a><br>
        <a href ="/forrestportal/about">Back</a>
        
        @if($action == 'changeimage')
            {{-- upload pic form --}}
            <h1>Upload New About Image</h1>
            <span>uploading new image will relpace current image</span>
            <br>
            <br>
            <br>
            <form action="" method="POST"  id="upload_form" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Choose Image</label>
                    <input type="file" name="file_name">
                </div>
                <div class="row">
                    <button type="submit" form="upload_form" class="btn btn-primary mt-5">Upload</button>
                </div>
                <input type="hidden" name="action" value="changeimage">
            </form>


        @elseif($action == 'editbio')
            {{--edit bio form --}}
            <h1>Edit Bio</h1>
            <span>free to leave paragraphs blank</span>
            <br>
            <br>
            <br>
            <form action="" method="POST"  id="bio_form" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Paragraph 1</label>
                    <textarea name="p1" cols="100" rows="7">{{$p1}}</textarea><br>
                    <label>Paragraph 2</label>
                    <textarea name="p2" cols="100" rows="7">{{$p2}}</textarea><br>
                    <label>Paragraph 3</label>
                    <textarea name="p3" cols="100" rows="7">{{$p3}}</textarea><br>
                    <input type="hidden" name="action" value="editbio">
                   
                </div>
                <div class="row">
                    <button type="submit" form="bio_form" class="btn btn-primary mt-5">Upload</button>
                </div>
            </form>

        @endif
    </div>
    @endisset

    

    
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

@extends('forrestportal.layouts.art')

@section('content')

<h1><?php echo $album_name ?></h1>

<div class="container">

    @foreach($year_name_with_photos as $year_file)
        <div class="row">
            <div class="col-4 bg-info">
            <h2>{{$year_file['year_name']}}</h2>
            </div>
        <button type="button" class="btn btn-link bg-dark"><a href="/forrestportal/art/{{$album_name}}/{{$year_file['year_name']}}/edit">edit</a></button>
        </div>
        <div class="row">
                @if(count($year_file['file_names']) > 0)
                    @foreach($year_file['file_names'] as $file_name)
                    <img src="{{ asset('storage/img/'.$file_name) }}" style="height: 100px">
                    @endforeach
                @endif
        </div>
    @endforeach

</div>







{{--
    <div>{{$year_name_with_photos[0]['year_name']}}</div>
    <div>{{$year_name_with_photos[0]['file_names'][0]}}</div>
    --}}
@endsection

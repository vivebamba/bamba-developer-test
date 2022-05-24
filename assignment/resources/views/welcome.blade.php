@extends('layouts.main')

@section('main')
    <div class="row row-cols-1 row-cols-md-2 row-cols-md-3 my-3">
        @foreach($movies as $movie)
            <div class="col g-5">
                <a href="#"
                   class="card h-100 bg-primary bg-opacity-25 p-2 p-md-3 p-lg-4 border-0 shadow text-decoration-none">
                    <img src="{{$movie->cover}}" class="card-img-top" alt="{{$movie->name}}}">
                    <div class="card-body ">
                        <p class="card-text text-center fs-5 fw-bold">{{$movie->name}}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection

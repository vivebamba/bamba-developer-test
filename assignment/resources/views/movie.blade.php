@extends('layouts.main')

@section('title', $movie->name)

@section('main')
    <div class="row shadow p-3 g-4 bg-light">
        <div class="col-md-6 ">
            <img src="{{$movie->cover}}" alt="{{$movie->name}}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1 class="fw-bold">{{$movie->name}}</h1>
        </div>
        <div class="col-12">
            @if (session('auditorium_full'))
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill"/>
                    </svg>
                    <div>
                        {{ session('auditorium_full') }}
                    </div>
                </div>
            @endif
            <div class="accordion accordion-flush" id="accordionTimes">
                @forelse($times as $keyTime => $bookings)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-{{$loop->index}}">
                            <button class="accordion-button @if(!$loop->first) collapsed @endif" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse-{{$loop->index}}"
                                    aria-expanded="@if($loop->first) true @else false @endif"
                                    aria-controls="flush-collapse-{{$loop->index}}">
                                {{$keyTime}}
                            </button>
                        </h2>
                        <div id="flush-collapse-{{$loop->index}}"
                             @class(['accordion-collapse', 'collapse', 'show' => $loop->first]) aria-labelledby="flush-heading-{{$loop->index}}"
                             data-bs-parent="#accordionTimes">
                            <div class="accordion-body">
                                @foreach($bookings as $booking)
                                    <a class="btn btn-primary rounded-pill px-4 me-3"
                                       href="{{route('movie.schedule', ['slug' => $movie->slug, 'booking' => $booking->id])}}"
                                       role="button">{{$booking->time}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info" role="alert">
                        <p class="h3">Lo sentimos :(</p>
                        No hay horarios para esta pelicula
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

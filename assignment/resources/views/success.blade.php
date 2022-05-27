@extends('layouts.main')

@section('main')
    <div class="row justify-content-center">
        <div class="col-11 col-md-4">
            <div class="card h-100 bg-light p-2 p-md-3 p-lg-4 border-0 rounded-3 shadow">
                <img src="{{asset('img/success.png')}}" class="card-img-top" alt="success-png">
                <div class="card-body ">
                    <p class="card-text text-center fs-5 fw-bold">Haz agendado tu pelicula</p>
                    <div class="row">
                        <div class="col-12">
                            <p class="fw-bold fs-6">Pelicula</p>
                            <p>{{$booker->booking->movie->name}}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="fw-bold fs-6">Sala</p>
                            <p>{{$booker->booking->auditorium->name}}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="fw-bold fs-6">Asiento</p>
                            <p>{{$booker->seats->number}}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="fw-bold fs-6">Dia</p>
                            <p>{{$booker->booking->day}}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="fw-bold fs-6">Hora</p>
                            <p>{{$booker->booking->time}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

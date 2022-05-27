@extends('layouts.main')

@section('main')
    <div class="row">
        <div class="col-md-6 ">
            <img src="{{$booking->movie->cover}}" alt="{{$booking->movie->name}}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1 class="fw-bold">{{$booking->movie->name}}</h1>
        </div>
        <div class="col-12 my-3">
            @if (session('seat_occupied'))
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill"/>
                    </svg>
                    <div>
                        {{ session('seat_occupied') }}
                    </div>
                </div>
            @endif
            <form class="row g-3" action="{{route('booker.store', $booking->id)}}" method="POST">
                @csrf
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" readonly class="form-control form-control-plaintext" id="day"
                               name="day" value="{{$booking->day}}">
                        <label for="day">Dia</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" readonly class="form-control form-control-plaintext"
                               id="time" name="time" value="{{$booking->time}}">
                        <label for="time">Hora</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror"
                               id="name" name="name" placeholder="name@example.com">
                        <label for="name">Nombre</label>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror"
                               id="email" name="email" placeholder="name@example.com">
                        <label for="email">Correo Electronico</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <select name="seat" class="form-select @error('seat') is-invalid @enderror"
                                id="seat" aria-label="Selecciona asiento">
                            @foreach($seats as $seat)
                                <option value="{{$seat->id}}">{{$seat->number}}</option>
                            @endforeach
                        </select>
                        <label for="seat">Selecciona asiento</label>
                        @error('seat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 d-grid gap-2 mx-auto">
                    <button type="submit" class="btn btn-secondary rounded-pill text-white">Agendar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

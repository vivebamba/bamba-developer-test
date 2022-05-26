@extends('layouts.main')

@section('main')
    <div class="row">
        <div class="col-md-6 ">
            <img src="{{$booking->movie->cover}}" alt="{{$booking->movie->name}}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1 class="fw-bold">{{$booking->movie->name}}</h1>
        </div>
        <div class="col-12">
            <form class="row g-3">
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" readonly class="form-control" id="day" name="day" value="{{$booking->day}}">
                        <label for="day">Dia</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" readonly class="form-control" id="time" name="time"
                               value="{{$booking->time}}">
                        <label for="time">Hora</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name@example.com">
                        <label for="name">Nombre</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        <label for="email">Correo Electronico</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <select class="form-select @error('seat') is-invalid @enderror" id="seat"
                                aria-label="Selecciona asiento">
                            @foreach($seats as $seat)
                                <option value="{{$seat->id}}">{{$seat->number}}</option>
                                <option value="{{$seat->id}}">{{$seat->number}}</option>
                                <option value="{{$seat->id}}">{{$seat->number}}</option>
                            @endforeach
                        </select>
                        <label for="seat">Seleccion asiento</label>
                        @error('seat')
                        <div class="invalid-feedback">
                           No existe ese asiento
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>
        </div>
    </div>
@endsection

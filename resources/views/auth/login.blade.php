@extends('layouts.layout')
@section('title','Login')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <h1 class="display-4 text-center text-primary">
                MyCms.com
            </h1>
            {!! Form::open(['route' => ['login'], 'method' => 'POST', 'class' => 'bg-white shadow rounded py-3 px-4']) !!}
                <label for="email">Correo electrónico</label>
                <div class="input-group py-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <label for="password">Contraseña</label>
                <div class="input-group py-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button class="btn btn-primary btn-lg btn-block mt-2"><i class="fas fa-sign-in-alt"></i> Iniciar sesion</button>
                <div class="mt-2" align="center">
                <a href="{{ route('password.request') }}">Recuperar contraseña</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

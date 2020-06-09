@extends('layouts.layout')
@section('title','Bienvenido')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h1 class="display-4 text-primary">
                    ! Cms para tí !
                </h1>
                <p class="lead text-secondary">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <a class="btn btn-lg btn-block btn-primary" 
                    href="{{ route('register') }}">
                    ¡ Registrate !
                </a>
                <a class="btn btn-lg btn-block btn-outline-primary" 
                    href="#">
                    Ayuda
                </a>
            </div>
            <div class="col-12 col-lg-6 py-4">
                <img src="/img/hojas.svg" class="img-fluid mb-4">
            </div>            
        </div>
    </div>
    {{-- @auth
    <p>Bienvenido usuario: {{ auth()->user()->name }}</p>
    @endauth --}}
@endsection
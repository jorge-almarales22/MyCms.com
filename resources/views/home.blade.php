@extends('layouts.layout')
@section('title','Inicio')
@section('content')
<div class="container">
  <div class="row">
    @if(auth()->user()->status == '100')
        <div class="col-12 col-lg-6">
            <h1 class="display-4 text-danger mt-3">
              ¡ Usuario baneado !
            </h1>
            <p class="lead text-secondary">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a class="btn btn-lg btn-block btn-danger" 
            href="{{ route('help') }}">
            ¡ Ayuda !
            </a>
        </div>
        <div class="col-12 col-lg-6 py-4">
            <img src="/img/banned.svg" class="img-fluid mb-4">
        </div>
    @else
      <div class="col-md-6">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="/img/social_users.svg" class="d-block w-100" alt="Crea tus blogs">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/img/girl.svg" class="d-block w-100" alt="Redes sociales">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/img/dashboard.svg" class="d-block w-100" alt="Redes sociales">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>            
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="col-md-6">
          <h1 class="display-3 text-primary">! Cms para tí !</h1>
          <p class="lead text-secondary">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>    
          <a class="btn btn-lg btn-block btn-primary" href="{{ route('products_create') }}">
            ¡ Sube tus productos !
          </a>
          <a class="btn btn-lg btn-block btn-success" href="#">
          ¡ Crea tu blog de tu marca !
          </a>                                  
      </div>
    @endif
  </div>
</div>
@endsection
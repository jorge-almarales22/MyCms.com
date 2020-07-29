@extends('layouts.layout')
@section('title', 'Estadisticas')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow bg-light rounded">
                    <div class="card-body">
                        <h4><i class="fas fa-users"></i> U. registrados</h4>
                        <p class="h2 text-center">{{ $users }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow bg-light rounded">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-clipboard-list"></i> Productos listados</h4>
                        <p class="h2 text-center">{{$products}}</p>
                    </div>
                </div>
            </div>
            @if(kvfj(auth()->user()->permissions, 'estadisticas_admin'))
            <div class="col-md-3">
                <div class="card shadow bg-light rounded">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-shopping-basket"></i> Ordenes hoy</h4>
                        <p class="h2 text-center">0</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow bg-light rounded">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-credit-card"></i> Facturado hoy</h4>
                        <p class="h2 text-center">0</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
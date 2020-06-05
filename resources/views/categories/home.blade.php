@extends('layouts.layout')
@section('title','Categorias')
@section('content')
    <div class="container">
    	<div class="row">
    		<div class="col-md-3">
    			<div class="card shadow bg-light">
    			  <div class="card-body">
    			  	<h4 class="text-center text-primary">Agregar categoria</h4>
    			    {!! Form::open(['route' => 'category.add']) !!}
							<label for="name">Nombre:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i></span>
								</div>
								<input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<label for="module">Modulo:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="fas fa-mouse-pointer"></i>
									</span>
								</div>
								{!! Form::select('module', getModulesArray(), 0, ['class' => 'custom-select']) !!}
							</div>
							<label for="icono">Icono:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="far fa-sun"></i></span>
								</div>
								<input id="icono" class="form-control @error('icono') is-invalid @enderror" name="icono" value="{{ old('icono') }}" required autocomplete="icono">
								@error('icono')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="py-2">
							<button class="btn btn-primary btn-lg btn-block"><i class="far fa-save"></i> Guardar</button>
							</div>    			    	
    			    {!! Form::close() !!}
    			  </div>
    			</div>
    		</div>
			<div class="col-md-9">
				<div class="card shadow bg-light">
					<div class="card-body">
						<div class="container">	
							<div class="d-flex align-content-center justify-content-between">
								<div>
									<h1 class="text-primary">Categorias</h1>
								</div>
								<div>
								<nav class="nav nav-pills nav-fill mb-2">
									@foreach(getModulesArray() as $m => $k)
									<a class="nav-link btn btn-outline-primary mr-2 mt-1 mb-1" href="{{ url('/categories/'.$m) }}">{{ $k }}</a>
									@endforeach
								</nav>
								</div>
							</div>
							<table class="table table-hover">
								<thead class="thead-dark">
									<tr>
										<th scope="col">Icono</th>
										<th scope="col">Nombre</th>
										<th scope="col">Acciones</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									@foreach($cats as $cat)
									<tr>
										<td>{!! htmlspecialchars_decode($cat->icono) !!}</td>
										<td>{{ $cat->name }}</td>
										<td width="10px">
											<a href="{{ route('category.edit', $cat->id) }}" class="btn btn-warning btn-sm">Editar</a>
										</td>
										<td >
											 {!! Form::open(['route' => ['category.destroy', $cat->id],
		           							'method'=> 'DELETE']) !!}
		           							<button class="btn btn-sm btn-danger">Eliminar</button>
		           							{!! Form::close() !!}
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<div class="col-md-12">
								<div class="mx-auto">
									{{ $cats->render() }}
								</div>
							</div>
						</div>				    
					</div>
				</div>
			</div>
    	</div>
    </div>
@endsection
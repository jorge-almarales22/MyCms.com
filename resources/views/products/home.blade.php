@extends('layouts.layout')
@section('title', 'Productos')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow bg-light">
			  <div class="card-body">
			  	<div class="d-flex justify-content-between align-items-center mb-2">
			  		<div>
			  			<h1 class="text-primary text-center">Productos</h1>		
			  		</div>
			  		<div>
			  			<a href="{{ route('products.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Agregar producto</a href="{{ route('products.create') }}">
			  		</div>
			  	</div>
			  	
			  	<table class="table table-hover">
			  		<thead class="thead-dark">
			  			<tr>
			  				<th scope="col">ID</th>
			  				<th scope="col">Estado</th>
			  				<th scope="col">Imagen</th>
			  				<th scope="col">Nombre</th>
			  				<th scope="col">Categoria</th>
			  				<th scope="col">Precio</th>
			  				<th scope="col">Acciones</th>
			  				<th scope="col"></th>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			@foreach($products as $product)
			  			<tr>
			  				<td width="50">{{ $product->id }}</td>
			  				<td >@if($product->status == '0') No publico @else publico @endif </td>
			  				<td width="64">
			  					<a href="{{ url('/uploads/'.$product->file_path.'/'.$product->image) }}" >
			  						<img src="{{ url('/uploads/'.$product->file_path.'/t_'.$product->image) }}" width="64">
			  					</a>
			  				</td>
			  				<td>{{ $product->name }}</td>
			  				<td>{{ $product->category->name }}</td>
			  				<td>{{ $product->price }}</td>
			  				<td width="10px">
			  					<a href="{{ route('products.edit',$product->id)  }}" class="btn btn-secondary btn-sm">Editar</a>
			  				</td>
			  				<td >
			  					{!! Form::open(['route' => ['products.destroy', $product->id],
			  					'method'=> 'DELETE']) !!}
			  					<button class="btn btn-sm btn-danger">Eliminar</button>
			  					{!! Form::close() !!}
			  				</td>			  						
			  			</tr>
			  			@endforeach
			  		</tbody>
			  	</table>
			  	<div class="row">
			  		<div class="col-md-12">
			  			{{ $products->render() }}	
			  		</div>
		  			
			  	</div>
			  </div>
			</div>
		</div>
	</div>
</div>
@endsection
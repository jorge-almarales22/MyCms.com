@extends('layouts.layout')
@section('title', 'Productos')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1 class="text-primary text-center display-6">Productos disponibles</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow bg-light">
			  <div class="card-body">
			  	<div class="row">
			  		<div class="col-12">
				  		<div class="col-3 float-left mb-3">
				  			@if(kvfj(auth()->user()->permissions, 'products_create'))
				  			<a href="{{ route('products_create') }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Agregar producto</a>
				  			@endif
				  		</div>
				  		@if(kvfj(auth()->user()->permissions, 'products_search'))
				  		{!! Form::open(['route' => 'products_search', 'method' => 'GET']) !!}	
							<div class="col-3 float-right mb-3">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-search-plus"></i></i></span>
									</div>
									<input id="search_cat" placeholder="Categoria del producto" class="form-control" name="search_cat">
								</div>
							</div>				  				  		
					  		<div class="col-3 float-right mb-3">
						  		<div class="input-group">
						  			<div class="input-group-prepend">
						  				<span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
						  			</div>
						  			<input id="search" placeholder="Nombre del producto" class="form-control" name="search">
							  	</div>
							</div>
							<button hidden=""></button>
						{!! Form::close() !!}
						@endif
					</div>							  	
			  	</div>
			  	<table class="table table-hover">
			  		<thead class="thead-dark">
			  			<tr>
			  				<th scope="col">ID</th>
			  				<th scope="col">Imagen</th>
			  				<th scope="col">Nombre</th>
			  				<th scope="col">Categoria</th>
			  				<th scope="col">Precio</th>
			  				<th scope="col">Acciones</th>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			@foreach($products as $product)
			  			<tr>
			  				<td width="50">{{ $product->id }}</td>
			  				<td width="64">
			  					<a href="{{ url('/uploads/'.$product->file_path.'/'.$product->image) }}" >
			  						<img src="{{ url('/uploads/'.$product->file_path.'/t_'.$product->image) }}" width="64">
			  					</a>
			  				</td>
			  				<td>{{ $product->name }} @if($product->status == '0') <i class="fas fa-eraser" data-toggle="tooltip" data-placement="top" title="Estado borrador"></i> @else publico @endif  </td>
			  				<td>{{ $product->category->name }}</td>
			  				<td>{{ $product->price }}</td>
			  				<td>
			  					<div class="btn-group btn-group-toggle" data-toggle="buttons">	  
			  						@if(kvfj(auth()->user()->permissions, 'products_edit'))
								    <a href="{{ route('products_edit',$product->id)  }}" class="btn btn-success btn-sm"><i class="far fa-edit"></i> Editar</a>			
								    @endif		
								    @if(kvfj(auth()->user()->permissions, 'products_destroy'))
				  					{!! Form::open(['route' => ['products_destroy', $product->id],
				  					'method'=> 'DELETE']) !!}
				  					<button class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
				  					{!! Form::close() !!}
				  					@endif
								</div>
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
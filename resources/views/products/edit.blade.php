@extends('layouts.layout')
@section('title', 'Editar Producto')
@section('content')
<div class="container">
	@if(kvfj(auth()->user()->permissions, 'products_edit'))	
	{!! Form::model($product, ['route' => ['products_edit', $product->id],'method' => 'PUT', 'files' => true]) !!}
	<div class="card bg-light shadow rounded">
		<h1 class="text-center text-secondary font-weight-bold mt-2">Editar producto</h1>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6 mb-2">
					<label for="name">Nombre:</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i></span>
						</div>
						<input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $product->name) }}" required autocomplete="name">
						@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				<div class="col-md-3 mb-2">
					<label for="category">Categoria</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
								<i class="fas fa-mouse-pointer"></i>
							</span>
						</div>
						{!! Form::select('category', $cats, $product->category_id, ['class' => 'custom-select']) !!}
					</div>			
				</div>
				<div class="col-md-3 mb-2">
					<label for="img">Imagen Destacada</label>
					<div class="custom-file">
						{!! Form::file('img', ['class' => 'custom-file-input', 'id'=> 'customFile', 'accept' => 'image/*']) !!}
						<label class="custom-file-label" for="customFile">Elige tu imagen</label>
					</div>
				</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="price">Precio:</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">
									<i class="fas fa-dollar-sign"></i>
								</span>
							</div>
							{!! Form::number('price', $product->price, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
						</div>
					</div>
					<div class="col-md-3">
						<label for="indiscount">En Descuento?:</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">
									<i class="fas fa-dollar-sign"></i>
								</span>
							</div>
							{!! Form::select('indiscount', ['0' => 'No', '1' => 'Si'], $product->in_discount, ['class' => 'custom-select']) !!}
						</div>
					</div>
					<div class="col-md-3">
						<label for="discount">Descuento:</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">
									<i class="fas fa-dollar-sign"></i>
								</span>
							</div>
							{!! Form::number('discount', $product->discount, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
						</div>
					</div>
					<div class="col-md-3">
						<label for="status">Estado</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">
									<i class="fas fa-keyboard"></i>
								</span>
							</div>
							{!! Form::select('status', ['0' => 'Borrador', '1' => 'Publico'], $product->status, ['class' => 'custom-select']) !!}
						</div>						
					</div>						
				</div>
				<div class="row mt-2">
					<div class="col-md-12">
						<label for="content">Descripción</label>
						{!! Form::textarea('content', $product->content, ['class' => 'form-control', 'id' => 'editor']) !!}
					</div>
			</div>
			<button class="btn btn-primary btn-lg mt-2 float-right"><i class="far fa-save"></i> Editar</button>	
			@if(kvfj(auth()->user()->permissions, 'products_home'))		
			<a href="{{ route('products_home') }}" class="btn btn-outline-primary btn-lg mt-2 mr-2 float-right">Cancelar</a>
			@endif
		</div>		
	</div>
	{!! Form::close() !!}
	@endif
</div>
@endsection
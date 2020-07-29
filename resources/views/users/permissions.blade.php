@extends('layouts.layout')
@section('title', 'Usuario')
@section('content')
<div class="container">
	@if(kvfj(auth()->user()->permissions, 'users_permissions'))
	{!! Form::open(['route' => ['users_permissions', $user->id]]) !!}
	<div class="row">
		<div class="col-md-4">
			<div class="card shadow rounded bg-light">
			  <div class="card-body">
			    <h3 class="text-secondary text-center"><i class="fas fa-laptop"></i> Modulo Productos</h3>
			    <hr>
			    <div class="container">
			    	<label><input type="checkbox" name="products_home" value="true" @if(kvfj($user->permissions, 'products_home')) checked @endif> Puede ver los productos.</label>
			    </div>	
			    <div class="container">
			    	<label><input type="checkbox" name="products_store" value="true" @if(kvfj($user->permissions, 'products_store')) checked @endif> Puede guardar productos.</label>
			    </div>	
			    <div class="container">
			    	<label><input type="checkbox" name="products_create" value="true" @if(kvfj($user->permissions, 'products_create')) checked @endif> Puede crear productos.</label>
			    </div>	
			    <div class="container">
			    	<label><input type="checkbox" name="products_search" value="true" @if(kvfj($user->permissions, 'products_search')) checked @endif> Puede buscar productos.</label>
			    </div>		
			    <div class="container">
			    	<label><input type="checkbox" name="products_edit" value="true" @if(kvfj($user->permissions, 'products_edit')) checked @endif> Puede editar productos.</label>
			    </div>		
			    <div class="container">
			    	<label><input type="checkbox" name="products_destroy" value="true" @if(kvfj($user->permissions, 'products_destroy')) checked @endif> Puede eliminar productos.</label>
			    </div>					    			    		    			    			    		    
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card shadow rounded bg-light">
			  <div class="card-body">
			    <h3 class="text-secondary text-center"><i class="fas fa-list-ol"></i> Modulo Categorias</h3>
			    <hr>
			    <div class="container">
			    	<label><input type="checkbox" name="categories_home" value="true" @if(kvfj($user->permissions, 'categories_home')) checked @endif> Puede ver categorias.</label>
			    </div>	
			    <div class="container">
			    	<label><input type="checkbox" name="category_add" value="true" @if(kvfj($user->permissions, 'category_add')) checked @endif> Puede guardar categorias.</label>
			    </div>	
			    <div class="container">
			    	<label><input type="checkbox" name="category_edit" value="true" @if(kvfj($user->permissions, 'category_edit')) checked @endif> Puede editar categorias.</label>
			    </div>				    
			    <div class="container">
			    	<label><input type="checkbox" name="category_destroy" value="true" @if(kvfj($user->permissions, 'category_destroy')) checked @endif> Puede eliminar categorias.</label>
			    </div>					    			    			    			    			    
			  </div>
			</div>
		</div>						
		<div class="col-md-4">
			<div class="card shadow rounded bg-light">
			  <div class="card-body">
			    <h3 class="text-secondary text-center"><i class="fas fa-home"></i> Modulo home</h3>
			    <hr>
			    <div class="container">
			    	<label><input type="checkbox" name="home" value="true" @if(kvfj($user->permissions, 'home')) checked @endif> Puede ver el home.</label>
				</div>	
				<div class="container">
			    	<label><input type="checkbox" name="estadisticas" value="true" @if(kvfj($user->permissions, 'estadisticas')) checked @endif> Puede ver las estadisticas.</label>
				</div>		  
				<div class="container">
			    	<label><input type="checkbox" name="estadisticas_admin" value="true" @if(kvfj($user->permissions, 'estadisticas_admin')) checked @endif> Puede ver las estadisticas de admin.</label>
			    </div>	
			  </div>
			</div>
		</div>			
	</div>
	<div class="row">
		<div class="col-md-4  mt-3">
			<div class="card shadow rounded bg-light">
			  <div class="card-body">
			    <h3 class="text-secondary text-center"><i class="fas fa-users"></i> Modulo Usuarios</h3>
			    <hr>
			    <div class="container">
			    	<label><input type="checkbox" name="users_home" value="true" @if(kvfj($user->permissions, 'users_home')) checked @endif> Puede ver modulo usuarios.</label>
				</div>
				<div class="container">
			    	<label><input type="checkbox" name="users_edit" value="true" @if(kvfj($user->permissions, 'users_edit')) checked @endif> Puede editar usuarios.</label>
			    </div>	
			    <div class="container">
			    	<label><input type="checkbox" name="users_show" value="true" @if(kvfj($user->permissions, 'users_show')) checked @endif> Puede ver usuarios.</label>
			    </div>	
			    <div class="container">
			    	<label><input type="checkbox" name="users_permissions" value="true" @if(kvfj($user->permissions, 'users_permissions')) checked @endif> Puede asignar permisos a usuarios.</label>
			    </div>	
			    <div class="container">
			    	<label><input type="checkbox" name="users_banned" value="true" @if(kvfj($user->permissions, 'users_banned')) checked @endif> Puede banear a usuarios.</label>
			    </div>				    			    			    			    
			  </div>
			</div>
		</div>			
	</div>
	<div class="row">
		<div class="col-md-2 mt-3">
			<button class="btn btn-primary btn-lg btn-block"><i class="far fa-save"></i> Guardar</button>
		</div>
	</div>  
	{!! Form::close() !!}
	@endif
</div>
@endsection
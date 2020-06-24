@extends('layouts.layout')
@section('title', 'Usuario')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="card shadow bg-light rounded">
			  <div class="card-body">
					<h3 class="text-secondary text-center">Información</h3>
				  	<hr>
				    @if(is_null($user->avatar))
				    <div align="center">
				    <img src="{{ url('/img/default_avatar.png') }}" width="100" height="100">
				    </div>
				    @else
				    <img src="{{ url('/uploads/user/'.$user->id.'/'.$user->avatar) }}" class="img-fluid">
				    @endif
				    <div class="py-1">
				    	<span class="text-primary"><i class="fas fa-user"></i> Nombre:</span>
				    	<span class="text-secondary mb-2">{{ $user->name }} {{ $user->lastname }}</span><br>
				    	<span class="text-primary"><i class="fas fa-user-shield"></i> Estado del usuario:</span>
				    	<span class="text-secondary mb-2">{{ getUserStatusArray(null, $user->status) }}</span><br>
				    	<span class="text-primary"><i class="far fa-envelope"></i> Correo electrónico:</span>
				    	<span class="text-secondary mb-2">{{ $user->email }}</span><br>
				    	<span class="text-primary"><i class="far fa-calendar-alt"></i> Fecha de registro:</span>
				    	<span class="text-secondary mb-2">{{ $user->created_at }}</span><br>
				    	<span class="text-primary"><i class="fas fa-user-tie"></i> Role de usuario:</span>
				    	<span class="text-secondary mb-2">{{ getRoleUserArray(null, $user->role) }}</span><br>
				    	@if($user->status == '100')
				    	@if(kvfj(auth()->user()->permissions, 'users_banned'))
				    	<a href="{{ route('users_banned', $user->id) }}" class="btn btn-success btn-block mt-2">Activar usuario</a>  
				    	@endif
				    	@else
				    	@if(kvfj(auth()->user()->permissions, 'users_banned'))
				    	<a href="{{ route('users_banned', $user->id) }}" class="btn btn-danger btn-block mt-2">Suspender usuario</a> 
				    	@endif
				    	@endif			     			    			    	
				    </div>			  	
			  </div>
			</div>
		</div>
	</div>
</div>
@endsection
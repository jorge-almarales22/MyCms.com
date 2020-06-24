@extends('layouts.layout')
@section('title', 'Usuarios')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="d-flex justify-content-between align-items-center mb-2">
				<div>
					<h1 class="text-primary">Usuarios</h1>
				</div>
				<div class="dropdown">
					<button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" 
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-filter"></i> Filtrar
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="{{ url('/users/all') }}"><i class="fas fa-stream"></i> Todos</a>
					<a class="dropdown-item" href="{{ url('/users/0') }}"><i class="fas fa-user-shield"></i> No verificados</a>
					<a class="dropdown-item" href="{{ url('/users/1') }}"><i class="fas fa-user-check"></i> Verificados</a>
					<a class="dropdown-item" href="{{ url('/users/100') }}"><i class="fas fa-heart-broken"></i> Suspendidos</a>
				</div>
			</div>	
			</div>
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
				      <th scope="col">Nombre</th>
				      <th scope="col">Apellido</th>
				      <th scope="col">Email</th>
				      <th scope="col">Role</th>
				      <th scope="col">Estado</th>
				      <th scope="col">Acción</th>
				      <th></th>				
					</tr>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{ $user->lastname }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ getRoleUserArray(null, $user->role) }}</td>
							<td>{{ getUserStatusArray(null, $user->status) }}</td>
							<td>
								@if(kvfj(auth()->user()->permissions, 'users_show'))
								<a href="{{ route('users_show', $user->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Ver</a>
								@endif
							</td>
							<td>
								@if(kvfj(auth()->user()->permissions, 'users_permissions'))
								<a href="{{ route('users_permissions', $user->id) }}" class="btn btn-success btn-sm"><i class="fas fa-user-cog"></i> Permisos</a>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</thead>
			</table>
		</div>
	</div>
</div>
@endsection
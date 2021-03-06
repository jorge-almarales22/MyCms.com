<div class="container"> 
	<nav  class="navbar navbar-light navbar-expand-sm bg-light shadow-sm">
		@auth
		@if(auth()->user()->status == '100')
		<a class="navbar-brand text-primary font-weight-bold" href="{{ route('welcome') }}">
			MyCms.com
		</a>
		@else
		<a class="navbar-brand text-primary font-weight-bold" href="{{ route('home') }}">
			MyCms.com
		</a>
		@endif
		@endauth
		@guest
		<a class="navbar-brand text-primary font-weight-bold" href="{{ route('welcome') }}">
			MyCms.com
		</a>
		@endguest
		<button class="navbar-toggler" type="button" 
			data-toggle="collapse" 
			data-target="#navbarSupportedContent" 
			aria-controls="navbarSupportedContent" 
			aria-expanded="false" 
			aria-label="{{ __('Toggle navigation') }}">
		    <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="nav nav-pills">
				@auth
				@if(auth()->user()->status == '100')
				<li class="nav-item">
					<a class="nav-link {{ request()->routeIs('help') ? 'active' : '' }}" href="{{ route('help') }}"><i class="fas fa-heart-broken"></i> Ayuda usuario baneado</a>
				</li>				
				@else
				@if(kvfj(auth()->user()->permissions, 'home'))
				<li class="nav-item">
					<a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}"><i class="fas fa-home"></i> Inicio</a>
				</li>
				@endif
				@if(kvfj(auth()->user()->permissions, 'users_home'))
					@if(auth()->user()->role == '1')
						<li class="nav-item">
							<a class="nav-link {{ request()->routeIs('users_home') ? 'active' : '' }} {{ request()->routeIs('users_show') ? 'active' : '' }} {{ request()->routeIs('users_permissions') ? 'active' : '' }}" href="{{ route('users_home', $all = 'all') }}"><i class="fas fa-users"></i> Usuarios</a>
						</li>
					@endif	
				@endif
				@if(kvfj(auth()->user()->permissions, 'products_home'))
					<li class="nav-item">
						<a class="nav-link {{ request()->routeIs('products_home') ? 'active' : '' }} {{ request()->routeIs('products_create') ? 'active' : '' }} {{ request()->routeIs('products_edit') ? 'active' : '' }}" href="{{ route('products_home') }}"><i class="fas fa-laptop"></i> Productos</a>
					</li>	
				@endif
					@if(kvfj(auth()->user()->permissions, 'categories_home'))
						<li class="nav-item">
							<a class="nav-link {{ request()->routeIs('categories_home') ? 'active' : '' }} {{ request()->routeIs('category_edit') ? 'active' : '' }} " href="{{ url('/categories/0') }}"><i class="fas fa-list-ol"></i> Categorias</a>
						</li>
					@endif
					@if(kvfj(auth()->user()->permissions, 'estadisticas'))
						<li class="nav-item">
							<a class="nav-link {{ request()->routeIs('estadisticas') ? 'active' : '' }} {{ request()->routeIs('estadisticas') ? 'active' : '' }} " href="{{ route('estadisticas') }}"><i class="fas fa-sort-amount-down"></i> Estadisticas</a>
						</li>
					@endif
				@endif							
				@endauth
				@guest				
				<li class="nav-item">
					<a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}"><i class="fas fa-user-check"></i> Registrarme</a>
				</li>			
				@else
				<li class="nav-item">
					<a class="nav-link" 
					href="#" 
					onclick="event.preventDefault();
		         	document.getElementById('logout-form').submit();"
		         	><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
		        </li>
				@endguest
			</ul>
	    </div>
	</nav>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
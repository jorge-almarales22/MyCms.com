<div class="container"> 
	<nav  class="navbar navbar-light navbar-expand-sm bg-white shadow-sm">
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
				<li class="nav-item">
					<a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}"> <i class="fas fa-home"></i> Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ request()->routeIs('users.home') ? 'active' : '' }}" href="{{ route('users.home', $all = 'all') }}"><i class="fas fa-users"></i> Usuarios</a>
				</li>	
				<li class="nav-item">
					<a class="nav-link {{ request()->routeIs('products.home') ? 'active' : '' }}" href="{{ route('products.home') }}"> <i class="fas fa-laptop"></i> Productos</a>
				</li>	
				<li class="nav-item">
					<a class="nav-link {{ request()->routeIs('categories.home') ? 'active' : '' }} {{ request()->routeIs('category.edit') ? 'active' : '' }} " href="{{ url('/categories/0') }}"> <i class="fas fa-list-ol"></i> Categorias</a>
				</li>
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
<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/app.css">
	<script src="/js/app.js" defer></script>
	{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
	<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
	<script src="https://kit.fontawesome.com/e4ff20d8c9.js" crossorigin="anonymous"></script>
	<script src="{{ url('/static/libs/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ url('/static/js/admin.js?v='.time()) }}"></script>	
</head>
<body>
	<div class="d-flex flex-column h-screen justify-content-between">
		<header>
			@include('sweetalert::alert')			
			@include('partials.nav')
			@include('partials.session')
		</header>
		<main class="py-4">
			@yield('content')
		</main>
		<footer class="bg-light text-center text-black-50 py-3 shadow">
			{{ config('app.name') }} | Copyright @ 2020
		</footer>
	</div>
</body>
</html>
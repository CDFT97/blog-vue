<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>@yield('meta-title', config('app.name'))</title>
	<meta name="description" content="@yield('meta-description', 'Este es el mi Blog' )">
	<link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('css/framework.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	@stack('styles')
</head>
<body>
	<div id="app">
		<div class="preload"></div>
		
		<header class="space-inter">
			<div class="container container-flex space-between">
				<figure class="logo"><img src="{{asset('img/logo.png')}}" alt=""></figure>
				
				<nav-bar></nav-bar>
			</div>
		</header>
		{{-- Contenido dinamico --}}
		<router-view :key="$route.fullPath"></router-view>

{{-- <div class="pagination">
	<ul class="list-unstyled container-flex space-center">
		<li><a href="#" class="pagination-active">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
	</ul>
</div> --}}
		
<section class="footer">
	<footer>
		<div class="container">
			<figure class="logo"><img src="{{asset('img/logo.png')}}" alt=""></figure>
			<nav>
				<ul class="container-flex space-center list-unstyled">
					<li><a href="index.html" class="text-uppercase c-white">home</a></li>
					<li><a href="about.html" class="text-uppercase c-white">about</a></li>
					<li><a href="archive.html" class="text-uppercase c-white">archive</a></li>
					<li><a href="contact.html" class="text-uppercase c-white">contact</a></li>
				</ul>
			</nav>
			<div class="divider-2"></div>
			<p>Nunc placerat dolor at lectus hendrerit dignissim. Ut tortor sem, consectetur nec hendrerit ut, ullamcorper ac odio. Donec viverra ligula at quam tincidunt imperdiet. Nulla mattis tincidunt auctor.</p>
			<div class="divider-2" style="width: 80%;"></div>
			<p>© 2022 - BlogVue. All Rights Reserved. Designed & Developed by <span class="c-white">Ing. César Febres</span></p>
		</div>
	</footer>
</section>


</div>
<script src="{{ mix('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
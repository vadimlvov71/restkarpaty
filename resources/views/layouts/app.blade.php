<?php 
					/*echo "<pre>";
					print_r($breadcrumbs);
					echo "</pre>";*/
					//$locale = "test";
					?>
					<html>
    <head>
        <title>@yield('title')</title>
       <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
       <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
       <script  type="text/javascript" src="{{ URL::asset('js/jquery-1.9.1.min.js') }}"></script>
		<script  type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    </head>

    <body>
        <div class="container">
			<header class="row">
				@include('includes.header')
			</header>
			@if(Request::path() != '/')
				@include('includes.breadcrumbs')
			@endif
			<div class = "container main">
						@yield('content')
					
				</div>
			</div>
			<div class = "container">
				@include('includes.menu')
			</div>
		</div>
    </body>
</html>

<html>
    <head>
         @include('includes.head')
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

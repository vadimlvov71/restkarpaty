@extends('layouts.app')

@section('title', $title)
<?php
$local = App::getLocale();
?>


@section('content')
 UPDATE dost SET content = REPLACE(content, 'http://vadimtur.ua/Karpaty/', 'http://vkarpatah.rest/')
    <h3>Index</h3>
	<?php
	echo "locale".$locale."<br>";
	/*print_r($locale);
	echo "</pre>";*/
	/*echo "!!!!!<pre>";
		print_r($constants);
		echo "</pre>";*/
	?>
	
    <h1 class="display-4 text-center" style="font-size: 3.0rem">{{ __('lang.welcome')}}</h1>
		@foreach ($products as $product)
			<a href="{{url($locale.'/'.$product->translit)}}">{{ $product->name }}</a>
		@endforeach
		<div class="col-sm-12">hotels
			<div class="row">
				@foreach ($hotels as $item)
				@php
					$product->translit = $item->translit;
				@endphp
					@include('commons.catalogs')
				@endforeach
			</div>
		</div>
@endsection


</html>

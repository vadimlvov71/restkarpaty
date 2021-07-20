@extends('layouts.app')
@section('title', __('lang.welcome'))

@section('content')
	<?php
	$local = App::getLocale();
	//echo "locale".$locale."<br>";
	/*print_r($locale);
	echo "</pre>";*/
	/*echo "!!!!!<pre>";
		print_r($constants);
		echo "</pre>";*/
	?>
	
    <h1 class="display-4 text-center" style="font-size: 3.0rem">{{ __('lang.welcome')}}</h1>
    <div class="col-sm-12"><h2 class="h_header"> {{ __('lang.curorts')}}</h2>
		<div class="row">
			@foreach ($products as $product)
				<div class="col-sm-3">
					<a href="{{url($locale."/".$product->translit)}}">
						<div class="hotel-section marginSection shadow">	
							<div class="hotelHeader">
								@if ($locale === "ua")
								{{__('lang.catalogs')[$product->id_product]}}
								@else
									{{$product->name}}
								@endif
								
							</div>
							<div class="img1">
								<img align="center"  class="hotel_image img-fluid-height" src="{{url($image_path.'/'.$product->smallfoto)}}" alt="{{$product->name}}">
							</div>
							
							<div class="hoteladditionalInfo">
									
							</div>
						</div>
					</a>
				</div>
			@endforeach
		</div>
	</div>
	
    <div class="col-sm-12"><h3 class="h_header">{{ __('lang.hotel_types')}}</h3>
		<div class="row">
			@foreach ($hotel_types as $hotel_type)
				<div class="item_rest_new">
					<a href="{{url($locale.'/'.$hotel_type->url)}}">{{ $hotel_type->name }}</a>
				</div>
			@endforeach
		</div>
	</div>
	<div class="col-sm-12"><h4 class="h_header">{{ __('lang.hotels')}}</h4>
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

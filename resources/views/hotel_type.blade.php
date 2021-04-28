@extends('layouts.app')
@section('title', 'About Us')

@section('header')
    @parent
    <h3>About Us</h3>
		
    <p><?//= $language ?> is awesome!</p>
@endsection
<?php
	echo "locale".$locale."<br>";
	echo "!!!!!<pre>";
	print_r($getHotelTypeQuery);
	echo "</pre>";
	/*echo "!!!!!<pre>";
		print_r($constants);
		echo "</pre>";*/
	?>
@section('content')
   <div class="row">
		<div class="col-sm-12">hotels
			<div class="row">
				@foreach ($hotels as $item)
					<div class="col-sm-3">
						<a href="{{url($item->translit."/".$item->sektor."/".$item->doma_id)}}">
							<div class="hotel-section marginSection shadow">	
								<div class="hotelHeader">{{$item->name}}</div>
								<div class="img1">
									<img align="center"  class="hotel_image img-fluid-height" src="{{url($image_path.'/smalldomgold/vadimtur'.$item->doma_id.'.jpg')}}" alt="">
								</div>
								<div class="hotelHeader">Подробно</div>
								<div class="hoteladditionalInfo">
									<div class="hotelAdditionalsectionAbsolute">
										
									</div>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>
		<div class="col-sm-12">
			<div class="row">
				@foreach ($hotel_types as $item)
					<div class="col-sm-3">
						<a href="{{url($item->url)}}">
							<div class="hotel-section marginSection shadow">	
								<div class="hotelHeader">{{$item->name}}</div>
								<div class="img1">
									
								</div>
								
								
							</div>
						</a>
					</div>
				@endforeach
			</div>
		</div>
		
	</div>	
@endsection
</section>


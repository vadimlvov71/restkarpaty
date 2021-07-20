@extends('layouts.app')
@section('title', $title)
<?php 
/*echo "!!!!!<pre>";
	print_r($test);
	echo "</pre>";
	* */
	?>
@section('header')
    @parent
    
		
  
@endsection

@section('content')
   <div class="row">
		<div class="col-sm-12">
			<div class="row">
				
				@foreach ($menu_rubrics as $menu_rubric)
					<div class="rubric-menu">
						{{ Template::rubricMenuTemplate($menu_rubric, $locale, $product, $hotel_type)}}
					</div>
				@endforeach
			</div>
		</div>
		<div class="col-sm-12">
			<div class="row">
				@foreach ($hotels as $item)
					@include('commons.catalogs')
				@endforeach
			</div>
		</div>
		
	</div>	
@endsection
</section>


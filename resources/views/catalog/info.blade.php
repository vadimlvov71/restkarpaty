@extends('layouts.app')

@section('title', $title)
@section('content')
    <h3>About Us</h3>
  
    <?php
  echo "<pre>";
		print_r($test);
		echo "</pre>";
		?>
    <div class="row">
		
		<div class="col-sm-12">
			<div class="row">
				@foreach ($menu_rubrics as $menu_rubric)
					<div class="rubric-menu">
						{{ Template::rubricMenuTemplate($menu_rubric, $locale, $product, "info")}}
					</div>
				@endforeach
			</div>
		</div>
		<div class="col-sm-12">
			<section class="white">
				<div class="img float-left margin-right-article">
					<img align="center" width="400" class="img-fluid-height" src="<?php echo($image_path."/".$product->foto)?>" alt="<?php echo($product->name)?>">
				</div>
				<div class="article-text"><?php echo($product->description)?></div>
			</section>
		</div>
		<div class="col-sm-12">hotels
			<div class="row">
				@foreach ($hotels as $item)
					@include('commons.catalogs')
				@endforeach
			</div>
		</div>
		<div class="col-sm-12">private
			<div class="row">
				@foreach ($privates as $item)
					@include('commons.catalogs')
				@endforeach
			</div>
		</div>
	</div>	
@endsection
</html>

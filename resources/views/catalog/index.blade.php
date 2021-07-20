@extends('layouts.app')

@section('title', $title)
@section('content')
    <h1 class="display-4 text-center" style="font-size: 3.0rem">{{$title}}</h1>
    <?php
  /*echo "<pre>";
		print_r($locale);
		echo "</pre>";*/
		
		?>
    <div class="row">
		<div class="col-sm-12">
			<div class="row">
				@foreach ($menu_rubrics as $menu_rubric)
					<div class="rubric-menu">
						{{ Template::rubricMenuTemplate($menu_rubric, $locale, $product, "")}}
					</div>
				@endforeach
			</div>
		</div>
		<div class="col-sm-12">
			<div class="preview">
				<div class="img float-left margin-right-article">
					<img align="center"  class="img-fluid-height" src="<?php echo($image_path."/".$product->smallfoto)?>" alt="<?php echo($product->name)?>">
				</div>
				<div class="article-text"><?php echo($product->description)?><a href="{{url($locale.'/'.$product->translit)}}/info">{{ __('lang.detailLinkText') }}</a></div>
			</div>
		</div>
		<div class="col-sm-12">
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

<?php

//////
/* $siteSettings = Site::getSiteSettings();
 $site = array();
 print_r($siteSettings);
 $site['currency'] = $siteSettings[0]["currency"];
*/
?>
<!-- Navigation -->

<nav class=" header-bg  fixed-top " id="mainNav" >
	<section class="navbar navbar-expand-md text-uppercase" style="padding: .5rem 1rem 0rem 1rem;">
		<div class="container">
			<a class="navbar-brand1111 js-scroll-trigger" href="#/">
				<img width="300" class="img-fluid d-block mx-auto" src="{{ URL::asset('public/images/restkarpatylogo.png') }}" alt="">
			</a>
			
			
			<div class="input-group " style="margin-right:50px;/*width:100%*/;padding: 0 0 4px 0;">
				<div class="input-group center" style="/*width:400px;height: 32px;position: relative;*/">
				<?php
			$an_array = ["index" , "type" , "catalog"];
			 if (in_array(Route::currentRouteName(), $an_array)) {
			 ?>
				@if ($locale === "ua")
					<span class="lang-select-active">ua</span>
					<a class="lang-select" href="{{url('lang/ru')}}">ru</a>
				@else
					<a class="lang-select" href="{{url('lang/ua')}}">ua</a>
					<span class="lang-select-active">ru</span>
				@endif
			<?php
			}
			?>
					<!--<a class="poisk-otelya" href="<#"> Поиск отеля</a>-->
					<!--<input id="searchBox" type="text" class="form-control-sm" placeholder="3 буквы" autocomplete="off">-->
					<!--<div class="input-group-append" style="">
						<button class="btn btn-secondary" type="button">
							<i class="fa fa-search"></i>
						</button>
					</div>
					-->
					<div id="searchResult" class="search-result "></div>	
				</div>
			 </div>
			<div class="dropdown show">
				  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					{{__('lang.curorts_header')}}
				  </a>

				  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

					@foreach ($catalogs as $catalog)
						<a class="dropdown-item" href="{{url($locale."/".$catalog->translit)}}">{{$catalog->name}}	</a>
					@endforeach
					<!--<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>-->
				  </div>
				</div>
		</div>
	</section>
					
</nav>
<br><br>

		

    

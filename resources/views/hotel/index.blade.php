@extends('layouts.app')

@section('title', $title)
<?php
//$local = App::getLocale();
?>
@php
echo "____<pre>";
print_r($hotel);
echo "<pre>";
exit;
  // $addresses = array($hotel->telef, $hotel->telef2, $hotel->telef3, $hotel->address);
@endphp

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-9 bgcolor-otel border-except-top">
			
			<section class="row">
				<div class="col-sm-3">
                   @if ($hotel->gold !== '5')
						@foreach ($addresses as $address)
							@if ($address != "")
								<div class="item_rest shadow">
									{{$address}}
								</div>
							@endif
						@endforeach
                   @else
						<div class="item_rest shadow">Простите, но информация по данному отелю неактуальна</div>
                   @endif
                </div>   
				<div class="col-sm-9 hotel-name">
					<h1><span>отель:</span>«{{$hotel->name}}»</h1>
					<div class="img-article 3">
						<img align="center"  class="img-fluid" src="<?php echo($site_domen_images)?>" alt="<?php echo($hotel->name)?>">
					</div>
				</div>
				
				<?php
				//TemplateComponents::linkToTypeHotel($resultsSingle, $domen);
				//TemplateComponents::domItem($hotel->name, $hotel, $type, '', $path, $imagePath, 0);
				TemplateComponents::domItem($hotel->wellcom, $hotel, $type, "wellcom", $path, $imagePath, 0);
				TemplateComponents::domItem($hotel->content, $hotel, $type, "об отеле", $path, $imagePath, 0);
				//echo "imagePath:::".$imagePath."<br>";
				//echo "numRooms:::".$numRooms."<br>";
				if($numRooms){
					$roomImg = "";
				}
				
				TemplateComponents::domItem($hotel->nomera, $hotel, $rooms, "номерной фонд", $path, $imagePath, 0);
				TemplateComponents::domItem($hotel->restoran, $hotel, $rooms, "питание", $path, $imagePath, 2);
				TemplateComponents::domItem($hotel->uslugy, $hotel, $type, "услуги", $path, $imagePath, 0);
				TemplateComponents::domItem($hotel->dopUslugy, $hotel, $type, "дополнительные услуги", $path, $imagePath, 0);
				TemplateComponents::domItem($hotel->saunaopis, $hotel, $type, "сауна/баня", $path, $imagePath, 0);
				TemplateComponents::domItem($hotel->dobratsa, $hotel, $type, "добраться", $path, $imagePath, 0);
				TemplateComponents::domItem($hotel->location, $hotel, $type, "расположение", $path, $imagePath, 0);
				TemplateComponents::domItem($hotel->dosug, $hotel, $type, "развлечения", $path, $imagePath, 0);
				TemplateComponents::domItem($hotel->detiopis, $hotel, $rooms, "отдых с детьми", $path, $imagePath, 4);
				TemplateComponents::domItem($hotel->bassein_opis, $hotel, $rooms, "бассейн", $path, $imagePath, 5);
				TemplateComponents::domItem($hotel->beach_opis, $hotel, $rooms, "пляж", $path, $imagePath, 8);
				TemplateComponents::domItem($hotel->shale, $hotel, $type, "шале", $path, $imagePath, 0);
				//TemplateComponents::domItem($hotel["nomera"], "img", "dffhghg", $domen, $imagePath);
				
				?>
				
			</section>
			<?php
			if($numPhotos < 3){
			?>
			<section>
				<div class="article-section1 marginSection shadow1">	
					<div class="hotel-section-title">Фотогалерея отеля:</div>
					<div class="hotel-section-text row1" style="width:450px;">
						<?php
						foreach($hotelPhotos as $item){
						?>
							<section class="white">
								<div class="article-text"><?php echo($item["name"])?></div>
								<div class="img float-left margin-right-article">
									<img align="center"  class="img-fluid-height" src="<?php echo($imagePath."/".$item["foto"])?>" alt="<?php echo($item["name"])?>">
								</div>
								
							</section>
							<?php
						}
						?>
					</div>
				</div>
			</section>
			<?php
		}
			?>
			<section>
				<div class="article-section1 marginSection shadow1">	
					<div class="hotel-section-title">Рубрики:</div>
					<div class="hotel-section-text row1" style="width:450px;">
						<?php
						foreach($results as $key => $result){
							if($result != "no"){
								foreach($result as $url => $name){
									echo "<div class='telefon'><a target='_blank' href='".$domen."/".$url.".html'>".$name."</a></div>";
								}
							}
						}
						?>
					</div>
				</div>
			</section>
			<!--
			<section>
				<div class="article-section1 marginSection shadow1">	
					<div class="hotel-section-title">Карта Гугл</div>
					<div class="hotel-section-text row1">
							<?php
							//echo $hotel->google_map;
							//echo "<pre>".$hotel->google_map."</pre><br>";
							
								?>
						
					</div>
				</div>
			</section>
			-->
		</div>
		<div class="col-sm-3">
			<section class="side shadow">
				<h2 class="text-class text-center"><a href="<?php echo($path)?>/hotels" class="text-class text-center">Гостиницы и пансионаты  <?php echo($product["name"]);?></a></h2>
				<div class="container">
				  <div class="row">
					<?php 
					/*echo "<pre>";
					print_r($product);
					echo "<pre>";*/
					foreach($hotels as $item){
						//echo "gold: ".$item->gold."<br>";
						TemplateComponents::itemArticleHotels($item, $path, $imagePath, $array_types);
					}
					?>
				  </div>
				</div>
			</section>
		</div>
		<?php
		if($hotel->gold != "5"){
		?>
			<section class="linkToTheHotelFix hotel-section marginSection shadow telefon-border">
				<div class="telefon-name">Прямые телефоны отеля с zatoka.rest:</div>
				<div class="telefon"><?php echo $hotel->telef?></div>
				<?php if(!empty($hotel->telef2)){?>
					<div class="telefon"><?php echo $hotel->telef2?></div>
				<?php } ?>
				<?php if(!empty($hotel->telef3)){?>
					<div class="telefon"><?php echo $hotel->telef3?></div>
				<?php } ?>
				
			</section>
		<?php
		}else{
			?>
			<div class="item_rest shadow">Простите, но информация по данному отелю неактуальна</div>
		<?php
		}
		?>
	</div>
</div>



</html>

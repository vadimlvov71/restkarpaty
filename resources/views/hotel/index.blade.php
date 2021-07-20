@extends('layouts.app')

@section('title', $title)
@section('content')
<!--<h1 class="display-4 text-center" style="font-size: 3.0rem">{{$title}}</h1>-->
<?php
//$local = App::getLocale();
/*
echo "____<pre>";
print_r($hotel);
echo "<pre>";
* */
 $type = ""; 
 //$path = $domen."/".$product->translit;
  $path ="" ;
  
  $results[] = Helper::getHotelTypes("type", $hotel->type);
$results[] = Helper::getHotelTypes("spa", $hotel->spa);
$results[] = Helper::getHotelTypes("deti_more", $hotel->deti_more);
$results[] = Helper::getHotelTypes("plyazh", $hotel->plyazh);
$results[] = Helper::getHotelTypes("corporative", $hotel->corporative);
$results[] = Helper::getHotelTypes("bassein", $hotel->bassein);
$results[] = Helper::getHotelTypes("sector", $hotel->sector);
$results[] = Helper::getHotelTypes("sektor", $hotel->sektor);
?>
@php
  $addresses = array($hotel->telef, $hotel->telef2, $hotel->telef3, $hotel->address);
  $site_domen_images = $image_path."/dom/vadimtur".$hotel->doma_id.".jpg";
$site_domen_images_small = $image_path."/smalldom/vadimtur".$hotel->doma_id.".jpg";
@endphp


<div class="col-sm-12">
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
				@include('commons.hotel_part_description', ['paragraph_title' => $hotel->wellcom, 'item' => $hotel, 'type' => $type, 'title' => 'wellcom', 'hotel_rooms' => '', 'typeroom' => '0'])
				@include('commons.hotel_part_description', ['paragraph_title' => $hotel->content, 'item' => $hotel, 'type' => $type, 'title' => 'об отеле', 'hotel_rooms' => '', 'typeroom' => '0'])
				@include('commons.hotel_part_description', ['paragraph_title' => $hotel->nomera, 'item' => $hotel, 'type' => $type, 'title' => "номерной фонд", 'hotel_rooms' => $rooms, 'typeroom' => '0'])
				@include('commons.hotel_part_description', ['paragraph_title' => $hotel->restoran, 'item' => $hotel, 'type' => $type, 'title' => "питание", 'hotel_rooms' => $rooms, 'typeroom' => '2'])
				@include('commons.hotel_part_description', ['paragraph_title' => $hotel->saunaopis, 'item' => $hotel, 'type' => $type, 'title' => "питание", 'hotel_rooms' => $rooms, 'typeroom' => '3'])
				<?php
				//Template::linkToTypeHotel($resultsSingle, $domen);
				//Template::domItem($hotel->name, $hotel, $type, '', $path, $image_path, 0);
				
				/*Template::domItem($hotel->wellcom, $hotel, $type, "wellcom", $path, $image_path, 0);
				Template::domItem($hotel->content, $hotel, $type, "об отеле", $path, $image_path, 0);
				//echo "imagePath:::".$image_path."<br>";
				//echo "numRooms:::".$numRooms."<br>";
				/*
				if($numRooms){
					$roomImg = "";
				}
				/*
				Template::domItem($hotel->nomera, $hotel, $rooms, "номерной фонд", $path, $image_path, 0);
				Template::domItem($hotel->restoran, $hotel, $rooms, "питание", $path, $image_path, 2);
				Template::domItem($hotel->uslugy, $hotel, $type, "услуги", $path, $image_path, 0);
				Template::domItem($hotel->dopUslugy, $hotel, $type, "дополнительные услуги", $path, $image_path, 0);
				Template::domItem($hotel->saunaopis, $hotel, $type, "сауна/баня", $path, $image_path, 0);
				Template::domItem($hotel->dobratsa, $hotel, $type, "добраться", $path, $image_path, 0);
				Template::domItem($hotel->location, $hotel, $type, "расположение", $path, $image_path, 0);
				Template::domItem($hotel->dosug, $hotel, $type, "развлечения", $path, $image_path, 0);
				Template::domItem($hotel->detiopis, $hotel, $rooms, "отдых с детьми", $path, $image_path, 4);
				Template::domItem($hotel->bassein_opis, $hotel, $rooms, "бассейн", $path, $image_path, 5);
				Template::domItem($hotel->beach_opis, $hotel, $rooms, "пляж", $path, $image_path, 8);
				Template::domItem($hotel->shale, $hotel, $type, "шале", $path, $image_path, 0);
				//Template::domItem($hotel["nomera"], "img", "dffhghg", $domen, $image_path);
				*/
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
									<div class="article-text"><?php echo($item->name)?></div>
									<div class="img float-left margin-right-article">
										<img align="center"  class="img-fluid-height" src="<?php echo($image_path."/".$item->foto)?>" alt="<?php echo($item->name)?>">
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
									echo "<div class='telefon'><a target='_blank' href=''>".$name."</a></div>";
								}
							}
						}
						?>
					</div>
				</div>
			</section>
			
		</div>
		<div class="col-sm-3">
			<section class="side shadow">
				<h2 class="text-class text-center"><a href="{{url($locale.'/hotels')}}" class="text-class text-center">Гостиницы и пансионаты  <?php echo($product->name);?></a></h2>
				<div class="container">
					<div class="row">
						@foreach ($hotels as $item)
							@include('commons.items_menu_right')
						@endforeach
					</div>
				</div>
			</section>
		</div>
		<?php
		if($hotel->gold != "5"){
		?>
			<section class="linkToTheHotelFix hotel-section marginSection shadow telefon-border">
				<div class="telefon-name">Прямые телефоны отеля с restkarpaty.com.ua:</div>
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


@endsection

</html>

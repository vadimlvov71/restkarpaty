<?php 
// Code within app\Helpers\Helper.php

namespace App\Helpers;
use Url;
class Template
{
    public static function rubricMenuTemplate($menu_rubric, $locale, $product, $page) {
		if($locale == "ru"){
			$name = $menu_rubric['name_ru'];
		}else{
			$name = $menu_rubric['name_ua'];
		}
		if ($menu_rubric['url'] != $page){
				echo "<a href='".url($locale."/".$product->translit."/".$menu_rubric['url']."'>".$name)."</a>";
				//echo "111";
		}else{
				echo  $name;
				//echo "222";
		}
		//return $result;
    }
    public static function ItemTemplate($item, $locale, $product, $image_path){
		?>
		<div class="col-sm-3">
			<a href="{{url($locale."/".$product->translit."/".Helper::getHotelTypeUrl($item->sektor)."/".$item->translit)}}">
				<div class="hotel-section marginSection shadow">	
					<div class="hotelHeader">{{$item->name}}</div>
					<div class="img1">
						<img align="center"  class="hotel_image img-fluid-height" src="{{url($image_path.'/smalldomgold/vadimtur'.$item->doma_id.'.jpg')}}" alt="{{$item->name}}">
					</div>
					<div class="hotelHeader">Подробно</div>
					<div class="hoteladditionalInfo">
						<div class="hotelAdditionalsectionAbsolute">
							
						</div>
					</div>
				</div>
			</a>
		</div>
		<?php
	}
						
    public static function theHotelLinkString($catalog, $product, $hotel){
		?>
		<a href='<?php echo($base) ?>/<?php echo $catalog["url"];?>/<?php echo $product["translit"];?>/<?php echo TranslitComponents::getHotelType($hotel["sektor"])."/".$hotel["doma_id"]."-".TranslitComponents::encodestring($hotel["name"].".html");?>'>
		<?php echo "name:".$hotel["name"]."<br>";?>
		</a>
		<?php
	}
	public static function theDostLinkHref($base, $item){
		/*echo "<pre>";
		print_r($catalog);
		echo "<pre>";*/
		?>
		<a href='<?php echo($base) ?>/<?php echo $item["url"];?>/<?php echo $item["translit"];?>/dostoprimechatelnosti/<?php echo ($item["id_dost"])?>-<?php echo (TranslitComponents::encodestring($item["name"]))?>.html'>
		<?php echo "name:".$item["name"]."<br>";?>
		</a>
		<?php
	}
////////
	public static function theRoomLinkHref($path, $hotel_type, $item){
		/*echo "<pre>";
		print_r($catalog);
		echo "<pre>";*/
		?>
		<a href='<?php echo($path) ?>/<?php echo $item["url"];?>/<?php echo $item["translit"];?>/dostoprimechatelnosti/<?php echo ($item["id_dost"])?>-<?php echo (TranslitComponents::encodestring($item["name"]))?>.html'>
		<?php echo "name:".$item["name"]."<br>";?>
		</a>
		<?php
	}
	///http://vadimtur.ua/dom/vadimtur754.jpg
	public static function item($item, $path, $imagePath, $type){
		//echo "gold::::".$item->gold."<br>";
		?>
	  <div class="col-sm-3">
		<a href="<?php echo($path)?>/<?php echo($item["translit"])?>/<?php echo(ReplaceArrayComponents::getHotelTypeUrl($item["sektor"]))?>/<?php echo ($item["hotel_translit"]) ?>">
			<div class="hotel-section marginSection shadow">	
				<div class="hotelHeader"><?php echo($item["name"])?></div>
				<div class="img1">
					<img align="center"  class="hotel_image img-fluid-height" src="<?php echo($imagePath)?>/smalldomgold/vadimtur<?php echo($item["doma_id"])?>.jpg" alt="">
				</div>
				<div class="hotelHeader">Подробно</div>
				<div class="hoteladditionalInfo">
					<div class="hotelAdditionalsectionAbsolute">
						<?php
						if($type != "rubric"){
						?>
							<div class="hotelAdditionalLink border-bottom">
								<a href="<?php echo($path)?>/<?php echo($item["translit"])?>" target="_blank">
									<?php echo($item["pname"])?>
								</a>
							</div>
						<?php
						}
						if($type != "hotel_type"){
						?>
						<div class="hotelAdditionalLink">
							<a href="<?php echo($path)?>/<?php echo($item["url"])?>.html" target="_blank">
								-<?php echo($item["htypename"])?>
							</a>
						</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</a>
	 </div>
	<?php
	}
	public static function itemArticleHotels($item, $path, $imagePath, $array_types){?>
	  <div class="col-sm-12">
		  
		<a href="{{url($locale.'/'.Helper::getHotelTypeUrl($item->sektor).'/'.$item->hotel_translit)}}>">
			<div class="hotel-section marginSection padding-section shadow">	
				<div class="hotelHeader"><?php echo($item->name)?></div>
				<div class="img1 center">
					<img align="center"  class="img img-fluid-height" src="<?php echo($imagePath)?>/smalldomgold/vadimtur<?php echo($item->doma_id)?>.jpg" alt="">
					
				</div>
			</div>
		</a>
	 </div>
	<?php
	}
	function itemsDom($item, $path, $type){?>
		<div class="col-sm-12">
			<a href="<?php echo($path)?>/dom<?php //echo($item["cat_translit"])?>/<?php //echo($item["goods_translit"]."_".$item["id"])?>">
				<div class="hotel-section marginSection shadow">	
					<div class="hotelHeader"><?php echo($item["name"])?></div>
					<div class="img">
						<img align="center" width="160" class="hotel_image img-fluid-height" src="<?php echo($path)?>/web/img/<?php echo($item["img"])?>" alt="">
					</div>
					<div class="hotelHeader">Подробно</div>
					
				</div>
			</a>
		 </div>
	<?php
	}
	public static  function article($item, $path, $imagePath, $type){
		if($type == "article"){
			$href = $path."/blog/".$item["id_article"]."-".TranslitComponents::encodestring($item["name"].".html");
		}else{
			$href = $path."/dostoprimechatelnosti/".$item["id_dost"]."-".TranslitComponents::encodestring($item["name"].".html");
		}
		?>
		<div class="col-sm-3">
			<a href="<?php echo($href)?>">
				<div class="article-section marginSection  shadow">	
					<div class="hotelHeader"><?php echo($item["name"])?></div>
					<div class="img1">
						<img align="center"  class="hotel_image img-fluid-height" src="<?php echo($imagePath)?>/<?php echo($item["smallfoto"])?>" alt="<?php echo($item["name"])?>">
					</div>
					<div class="hotelHeader">Подробно</div>
					
				</div>
			</a>
		 </div>
	<?php
	}
	function gallery($item, $path){
		if($type == "article"){
			$href = "article";
		}else{
			$href = "dost";
		}
		?>
		<div class="col-sm-12 blue">
				<div class="article-section marginSection shadow">	
					<div class="hotelHeader"><?php echo($item["name"])?></div>
					<div class="img">
						<img align="center" width="800" class="hotel_image_full" src="<?php echo($path)?>/web/img/<?php echo($item["img"])?>" alt="">
					</div>				
				</div>
			
		 </div>
	<?php
	}
	public static function domItem($paragraph_title, $item, $rooms, $title, $path, $imagePath, $typeroom){
		
		/*if($type == "article"){
			$href = "article";
		}else{
			$href = "dost";
		}*/
		
		/*echo "<pre>";
		print_r($rooms);
		echo "</pre>";*/
		$sektor = Helper::getHotelTypeUrl($item->sektor);
		
		if($paragraph_title != ""){
			?>
			<div class="col-sm-12">
				<div class="article-section1 marginSection shadow1">
					<?php if($title != "wellcom"){?>	
						<div class="hotel-section-title"><?php echo($title)?></div>
					<?php } ?>	
					<div class="hotel-section-text row float-left" style="margin-right: 0px;margin-left: 0px;">
						<?php
						if($rooms != ""){
							
							foreach($rooms as $room){
								$roomUrl = $path."/".$sektor."/".$item->hotel_translit."/".Translit::encodestring($room->name)."-".$room->room_id;
								//echo($roomUrl."<br>");
								if($room->typeroom == $typeroom){
									?>
									<div class="col-sm-4">
										<div class="hotel-section marginSection shadow">
											<a class='room-' href="<?php echo($roomUrl)?>">
												<div>
													<div class='hotelHeader'><?php echo($room->name)?></div>
													<img class="img img-fluid-height" src="<?php echo($imagePath)?>/roomfotosmall/rest<?php echo($room->room_id)?>.jpg" alt="<?php echo($room->name)?>">
													<div class='hotelHeader'>Подробно...</div>
												</div>
											</a>
										</div>
									</div>
									
									<?php
								}
							}
						}
						?>
						<span class=""><?php echo($paragraph_title)?></span>
						
						
					</div>			
				</div>
			 </div>
			<?php
		}
	}
	public static function roomAnonce($roomUrl, $imagePath, $room){
		?>
		<a class='' href="<?php echo($roomUrl)?>">
			<div><?php echo($room["name"])?></div>
			<img align="center"  class="hotel_image_dom" src="<?php echo($imagePath)?>/roomfotosmall/rest<?php echo($room["room_id"])?>.jpg" alt="<?php echo($room["name"])?>">
		</a>
		<?php
	}
	public static function rubricMenu($path, $menus, $page, $numDosts){
		$class = "";
		
		?>
		
			<div class="container">
				<ul class="nav nav-tabs">
					<?php 
					if($numDosts === 0){
						unset($menus["dost"]);
					}
					/*echo "<pre>";
					print_r($menus);
					echo "</pre>";*/
					foreach($menus as $menu){
						foreach($menu as $url => $name){
							/*if($url == "info"){
								$url = "kurort.html";
								//echo "11111".$url."<br>";
							}else{
								//echo "00000".$url."<br>";
							}*/
							
							
						//echo "page".$page."<br>";	
						//echo "url".$url."<br>";
							if($page == $url){
								$class = "active";
								$class_div = "";
								//echo "1";
							}else{
								$class = "";
								$class_div = "hotel-section-menu1";
								//$url .= "/";
								//echo "0";
							}
							if($url == ""){
								$url = "";
							}else{
								$url = "/".$url;
							}
							//if($page != "TSentr_Zatoki_Bugaz" && $url != "dost" ){
								?>
								<li class="nav-item <?php echo($class_div)?>" style="padding:0 6px;">
									<a class="nav-link <?php echo($class)?>" href="<?php echo($path.$url)?>"><?php echo($name)?></a>
								</li>
							<?php
							//}
						}
					}
					?>
				</ul>
			</div>
	<?php
	}
	public static function hotelMenu($hotelUrl, $hotel, $menus, $page){
		//echo "hotelUrl : ".$hotelUrl."<br>";
		?>
		<div class="container">
				<ul class="nav nav-tabs" style="border-bottom: 0;">
					<?php 
					/*if($numDosts === 0){
						unset($menus["dost"]);
					}*/
					/*echo "<pre>";
					print_r($menus);
					echo "</pre>";*/
					foreach($menus as $url => $name){
						//echo "url:::".$url."<br>";
						//echo "page:::".$page."<br>";
						//foreach($menu as $url => $name){
							/*if($url == "info"){
								$url = "kurort.html";
								//echo "11111".$url."<br>";
							}else{
								//echo "00000".$url."<br>";
							}*/
							/*
							if($url == "home"){
								$url = "";
							}else{
								$url = "/".$hotelUrl;
							}
							*/
							if($url == "home"){
								$otel = "отель: ";
							}else{
								$otel = "";
							}
						//echo "url".$url."<br>";
							if($page == $url){
								$class = "active_new";
								$class_div = "active_new bgcolor-otel border-except-bottom";
								$text = $otel." ".$name;
								//echo "1";
							}else{
								if($url == "home"){
									$url = "";
								}else{
									$url = "/".$url;
								}
								//echo "url".$url."<br>";
								$class = "";
								$class_div = "hotel-section-menu";
								$text = "<a class=\"nav-link\" href=\"".$hotelUrl.$url."\">".$otel." ".$name."</a>";
								//echo "0";
							}
							
								?>
								<li class="nav-item <?php echo($class_div)?>">
									<?php echo($text)?>
								</li>
							<?php
							
						//}
					}
					?>
				</ul>
			</div>
	<?php
	}
	public static function hotel_details($addresses, $gold){
		if($gold != 5){
			foreach($addresses as $address){
				if($address != ""){
					?>
					<div class="item_rest shadow">
						<?php echo($address)?>
					</div>
					<?php
				}			
			}
		}else{?>
			<div class="item_rest shadow">Простите, но информация по данному отелю неактуальна</div>
		<?php	
		}
		/*
		if($page == "dom"){
			$url_name = "Карта, как добраться";
		}else{
			$url_name = "Страница гостиницы";
		}*/
		?>
		<!--
		<div class="item_rest shadow">
			<a href="http://localhost/rest/hotel_type"><?php //echo($url_name)?></a>
		</div>
		-->
		<?php
	}
	public static function linkToTheHotel($domHref, $site_domen_images, $hotel){
		?>
		<a href="<?php echo($domHref)?>">
			<div class="link-to-the-hotel d-flex">
				<div style="padding-right:8px;">
					
						<img align="center"  class="img-fluid1111" src="<?php echo($site_domen_images)?>" alt="<?php echo $hotel->name;?>">
					
				</div>
				<div>
					Перейти на страницу гостиницы:<br>
					<?php echo $hotel->name;?>
				</div>
			</div>
		</a>
		<?php
	}
	public static function linkToTypeHotel($hotelTypeArray, $domen){
		if(!empty($hotelTypeArray[0])){
			//echo "yes";
			$hotelTypeArrayResults = $hotelTypeArray[0];
		}else if(!empty($hotelTypeArray[1])){
			//echo "no";
			$hotelTypeArrayResults = $hotelTypeArray[1];
		}else{
			//echo "no000000";
			$hotelTypeArrayResults = $hotelTypeArray[2];
		}
		foreach($hotelTypeArrayResults as $url => $name){
			//echo "####".$name;
			echo "<div class='telefon'><a target='_blank' href='".$domen."/".$url."'>".$name."</a></div>";
		}
	
	}		
}

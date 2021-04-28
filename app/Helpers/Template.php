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
						
    public static function getHotelTypeQuery($type_hotel){
		if($type_hotel != "chastnyi-sektor" && $type_hotel != "private-sektor"){
			$sektor = "0";
		}else{
			$sektor = "1";
		}
		if($type_hotel == "gostevye_doma"){
		    $paraQuery[0] = "type";
			$paraQuery[1] =  "12";
		}else if($type_hotel == "pansionati"){
		    $paraQuery[0] = "type";
			$paraQuery[1] =  "2";
		}else if($type_hotel == "bazi_otdyha"){
			$paraQuery[0] = "type";
			$paraQuery[1] =  "3";
		}else if($type_hotel == "sanatorii"){
		    $paraQuery[0] = "type";
			$paraQuery[1] =  "5";
		}else if($type_hotel == "sauna_banya_hotel"){
			$paraQuery[0] = "spa";
			$paraQuery[1] =  "1";
		}else if($type_hotel == "Bassein"){
			$paraQuery[0] = "bassein";
			$paraQuery[1] =  "1";
		}else if($type_hotel == "Children"){
			$paraQuery[0] = "deti_more";
			$paraQuery[1] =  "1";
		}else if($type_hotel == "Beach"){
			$paraQuery[0] = "plyazh";
			$paraQuery[1] =  "1";
		}else if($type_hotel == "Korporative"){
			$paraQuery[0] = "corporative";
			$paraQuery[1] =  "1";	
		}else if($type_hotel == "mini_hoteli"){
		    $paraQuery[0] = "type";
			$paraQuery[1] =  "6";
		}else if($type_hotel == "vip_rest"){
			$paraQuery[0] = "sector";
			$paraQuery[1] =  "1";
		}else if($type_hotel == "ellingi"){
		    $paraQuery[0] = "type";
			$paraQuery[1] =  "13";
		}else if($type_hotel == "shale"){
		    $paraQuery[0] = "type";
			$paraQuery[1] =  "14";
		}else if($type_hotel == "kvartyry-posutochno"){
		    $paraQuery[0] = "type";
			$paraQuery[1] =  "15";
		}else if($type_hotel == "nedorogie-hotels"){
		   $paraQuery[0] = "sector";
			$paraQuery[1] =  "3";
		}else if($type_hotel == "best-hotels"){
		   $paraQuery[0] = "sector";
			$paraQuery[1] =  "2";
		}else if($type_hotel == "comfortable-hotels"){
		   $paraQuery[0] = "sector";
			$paraQuery[1] =  "2";
		}else{
			$paraQuery = $sektor;
		}
		return $paraQuery;
	}
}

<?php 
// Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{
	public static function localeType($name, $locale)
    {
		if($locale == "ru"){
			$array["hotels"] = "гостиницы";
			$array["private_sector"] = "частный сектор";
			$array["opis"] = "описание курорта";
			$array["dosts"] = "достопримечательности";
		}else{
			$array["hotels"] = "готелі";
			$array["private_sector"] = "приватний сектор";
			$array["opis"] = "опис курорту";
			$array["dosts"] = "пам'ятки";
		}
		return $array[$name];
	}
    public static function rubricMenu($pageName)
    {
		$name_hotels = "гостиницы";
		$name_privates = "частный сектор";
		$name_opis = "описание курорта";
		
		$menu[] = array('url' => "", "name_ru" => $pageName, "name_ua" => $pageName);
		$menu[] = array('url' => "hotels", "name_ru" => "гостиницы", "name_ua" => "готелі");
		$menu[] = array('url' => "private_sector", "name_ru" => "частный сектор", "name_ua" => "приватний сектор");
		$menu[] = array('url' => "info", "name_ru" => "описание курорта", "name_ua" => "опис курорту");
		$menu[] = array('url' => "dosts", "name_ru" => "достопримечательности", "name_ua" => "пам'ятки");
		
        return $menu;
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
		}else if($type_hotel == "bassein"){
			$paraQuery[0] = "bassein";
			$paraQuery[1] =  "1";
		}else if($type_hotel == "children"){
			$paraQuery[0] = "deti_more";
			$paraQuery[1] =  "1";
		}else if($type_hotel == "rybalka"){
			$paraQuery[0] = "rybalka";
			$paraQuery[1] =  "1";
		}else if($type_hotel == "beach"){
			$paraQuery[0] = "plyazh";
			$paraQuery[1] =  "1";
		}else if($type_hotel == "korporative"){
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
		}else if($type_hotel == "private_sector"){
			$paraQuery[0] = "sektor";
			$paraQuery[1] =  "1";
			//$paraQuery = $sektor;
		}else if($type_hotel == "hotels"){
			$paraQuery[0] = "sektor";
			$paraQuery[1] =  "0";
		}
		return $paraQuery;
	}
	public static function getHotelTypes($type, $type_number, $link_type="plural"){
		$result = array();
		if($type == "sektor" && $type_number == "1"){
			if($link_type == "single"){
				$private = "Частный сектор".self::$kurort;
			}else{
				$private = "Частный сектор";
			}
			$result["private_sector"] = $private;
		}else{
			if($link_type == "single"){
				$guest = "Гостевой дом";
				$pansionati = "Пансионат".self::$kurort;
				$base = "База отдыха".self::$kurort;
				$mini = "Мини-гостиница".self::$kurort;
				$nedorogie = "Недорогая гостиница".self::$kurort;
				$comfortable = "Комфортабельная гостиница".self::$kurort;
			}else{
				$guest = "Гостевые дома";
				$pansionati = "Пансионаты";
				$base = "Базы отдыха";
				$mini = "Мини-гостиницы";
				$nedorogie = "Недорогие гостиницы";
				$comfortable = "Комфортабельные гостиницы";
			}
			//echo "type".$type."<br>";
			//echo "type_number".$type_number."<br>";
			if($type == "type"){
				if($type_number == "12"){
					$result["gostevye_doma"] = "Гостевые дома";
				}else if($type_number == "2"){
					$result["pansionati"] = $pansionati;
				}else if($type_number == "3"){
					$result["bazi_otdyha"] = $base;
				}else if($type_number == "6"){
					$result["mini_hoteli"] = $mini;
				}
			}else if($type == "spa" ){
				if($type_number == "1"){
					$result["spa"] = "Гостиница с сауной или баней";
				}else{
					$result = "no";
				}
			}else if($type == "deti_more" ){
				if($type_number == "1"){
					$result["children"] = "Отдых с детьми на море";
				}else{
					$result = "no";
				}	
			}else if($type == "plyazh"){
				if($type_number == "1"){
					$result["beach"] = "Гостиница со своим пляжем";
				}else{
					$result = "no";
				}	
			}else if($type == "corporative"){
				if($type_number == "1"){
					$result["korporative"] = "Корпоратив на море";
				}else{
					$result = "no";
				}	
			}else if($type == "bassein"){
				if($type_number == "1"){
					$result["bassein"] = "Гостиница с бассейном";
				}else{
					$result = "no";
				}	
			}else if($type == "sector"){
				if($type_number == "1"){
					$result["vip_rest"] = "VIP отдых";
				}else if($type_number == "2"){
					$result["comfortable-hotels"] = $comfortable;
				}else if($type_number == "3"){
					$result["nedorogie-hotels"] = $nedorogie;
				}	
			}
		}
		return $result;
	}
	public static function getHotelTypeUrl($type){
		$replace = array("0" => "hotels", "1" => "private_sector");
		return $replace[$type];
	}
	public static function getHotelTypeName($sektor, $locale){
		if($locale == 'ua'){
			$replace = array("0" => "готелі", "1" => "приватний сектор");
		}else{
			$replace = array("0" => "гостиницы", "1" => "частный сектор");
		}
		return $replace[$sektor];
	}
}

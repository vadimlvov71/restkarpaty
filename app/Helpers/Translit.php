<?php 
// Code within app\Helpers\Helper.php

namespace App\Helpers;


class Translit{
    public static function encodestring($string){
		
		//echo "st:::".$st;
		//$st = utf8_encode($st);
		//iconv("windows-1251", "utf-8", $st);
		//iconv("utf-8","windows-1251", $st);
		$string = str_replace(' ', '_', $string);
		$string = str_replace('(', '', $string);
		$string = str_replace(')', '', $string);
		$string = str_replace('"', '', $string);
		$string = str_replace('/', '', $string);
		$string = str_replace('«', '', $string);
		$string = str_replace('»', '', $string);
		$string = str_replace('–', '', $string);
		//$string = str_replace('2', '2', $string);
		//$string = preg_replace('/(\d+)/', "$1", $string);
		//$st = mb_convert_encoding($st, "windows-1251", "utf-8");
		/*$st = str_replace('/', '', $st);
		$st = str_replace('"', '', $st);
		$st = str_replace('“', '', $st);
		$st = str_replace('”', '', $st);
		$st = str_replace('.', '', $st);
		$st = str_replace('…', '', $st);
		$st = str_replace(',', '', $st);
		$st = str_replace('–', '', $st);
		$st = str_replace('—', '', $st);
		$st = str_replace('+', '-', $st);
		$st = str_replace('?', '', $st);
		$st = str_replace('!', '', $st);
		$st = str_replace(':', '', $st);
		$st = str_replace('«', '', $st);
		$st = str_replace('»', '', $st);
		$st = str_replace('&', '', $st);
		$st = str_replace('(', '', $st);
		$st = str_replace(')', '', $st);
		$st = str_replace("'", "", $st);
		$st = str_replace("і", "i", $st);
		$st = str_replace("І", "I", $st);
		$st = str_replace("№", "N", $st);*/
		$replace=array(
		"'"=>"",
		"`"=>"",
		"(", "",
		")", "",
		"\"", "",
		" ", "_",
		"-", "_",
		"№"=>"N",
		"а"=>"a","А"=>"a",
		"б"=>"b","Б"=>"b",
		"в"=>"v","В"=>"v",
		"г"=>"g","Г"=>"g",
		"д"=>"d","Д"=>"d",
		"е"=>"e","Е"=>"e",
		"ж"=>"zh","Ж"=>"zh",
		"з"=>"z","З"=>"z",
		"и"=>"i","И"=>"i",
		"й"=>"y","Й"=>"y",
		"к"=>"k","К"=>"k",
		"л"=>"l","Л"=>"l",
		"м"=>"m","М"=>"m",
		"н"=>"n","Н"=>"n",
		"о"=>"o","О"=>"o",
		"п"=>"p","П"=>"p",
		"р"=>"r","Р"=>"r",
		"с"=>"s","С"=>"s",
		"т"=>"t","Т"=>"t",
		"у"=>"u","У"=>"u",
		"ф"=>"f","Ф"=>"f",
		"х"=>"h","Х"=>"h",
		"ц"=>"c","Ц"=>"c",
		"ч"=>"ch","Ч"=>"ch",
		"ш"=>"sh","Ш"=>"sh",
		"щ"=>"sch","Щ"=>"sch",
		"ъ"=>"","Ъ"=>"",
		"ы"=>"y","Ы"=>"y",
		"ь"=>"","Ь"=>"",
		"э"=>"e","Э"=>"e",
		"ю"=>"yu","Ю"=>"yu",
		"я"=>"ya","Я"=>"ya",
		"і"=>"i","І"=>"i",
		"ї"=>"yi","Ї"=>"yi",
		"є"=>"e","Є"=>"e",
		////
		"0"=>"0", "1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4","5"=>"5", "6"=>"6", "7"=>"7", "8"=>"9", "9"=>"9"
	);
		// Сначала заменяем "односимвольные" фонемы.
		return $str=iconv("UTF-8","UTF-8//IGNORE",strtr($string,$replace));
	}
}

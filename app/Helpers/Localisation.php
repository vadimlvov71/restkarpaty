<?php 
// Code within app\Helpers\Helper.php

namespace App\Helpers;


class Localisation{
    public static function getCatalogsLocale($id_catalog){
		$curorts = array();
		$curorts[1] = "Славське";
		$curorts[12] = "Яремче";
		$curorts[140] = "Татарів";
		return $curorts[$id_catalog];
	}
}

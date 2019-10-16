<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('loginTimeStamp'))
{
	function loginTimeStamp($rndcode) {

		srand( rand(0,time()). $rndcode );

		$EngMap = "ABCDEFGHIJKLMNOPQRSTUVWZYZ0123456789abcdefghijklmnopqrstuvwxyz-";


		$login_Timestamp = "";

		for ($i=1; $i <=128; $i++) {
			$login_Timestamp .= $EngMap{rand(0,62)};
		}

		return $login_Timestamp;
	}
}

// 星座判斷
if ( ! function_exists('constellation'))
{
	// 判斷星座
	function constellation($month, $day) {

		if( $month < 1 || $month > 12 || $day < 1 || $day > 31 ) return false;

		$constellations = array(array("20" => "1"), array("19" => "2"), array("21" => "3"), array("20" => "4"), array("21" => "5"), array("22" => "6"), array("23" => "7"), array("23" => "8"), array("23" => "9"), array("24" => "10"), array("22" => "11"), array("22" => "12"));

		list($constellation_start, $constellation_name) = each($constellations[(int)$month - 1]);

		if ($day < $constellation_start) {

			list($constellation_start, $constellation_name) = each($constellations[($month - 2 < 0) ? $month = 11 : $month -= 2]);
		}

		return $constellation_name;
	}
}

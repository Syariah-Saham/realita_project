<?php 
namespace App\Helpers;

class Number
{
    public static function format($number)
    {
    	$length = strlen($number);
    	if($length > 12) {
    		$number = $number / 1000000000000;
    		$number = round($number , 2);
    		$number .= ' T';
    	} elseif($length > 9) {
    		$number = $number / 1000000000;
    		$number = round($number , 2);
    		$number .= ' M';
    	} else if($length > 6) {
    		$number = $number / 1000000;
    		$number = round($number , 2);
    		$number .= ' Jt';
    	}
    	return $number;
    }
}

<?php 
namespace App\Helpers;

class ListFiles
{
	public static function get($path)
	{
		return array_diff(scandir($path) , ['.' ,'..']);
	}
}
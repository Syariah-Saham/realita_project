<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dictionary;

class DictionaryController extends Controller
{
    
    
    
    /**
      * route: /member/dictionary
      * method: get
      * params: null
      * description: 
        * this method for show dictionary
      * @return : @var view
    */
    public function index () 
    {
    	$items = Dictionary::orderBy('keyword')->get();
    	return view('vendor.member.dictionary' , ['items' => $items]);
    }
    	
}

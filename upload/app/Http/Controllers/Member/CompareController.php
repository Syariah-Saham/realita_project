<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    
    
    
    /**
      * route: member/compare
      * method: get
      * params: null
      * description: 
        * this method will return view comparison
      * @return : @var view
    */
    public function index () 
    {
    	return view('vendor.member.compare');
    }
    	
}

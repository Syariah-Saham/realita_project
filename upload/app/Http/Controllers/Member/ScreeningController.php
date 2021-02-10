<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScreeningController extends Controller
{
    
    
    
    /**
      * route: member/screening
      * method: get
      * params: null
      * description: 
        * this method will return view screening
      * @return : @var view
    */
    public function index () 
    {
    	return view('vendor.member.screening');
    }
    	
}

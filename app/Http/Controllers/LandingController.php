<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    
    
    
    /**
      * route: 
      * method: get
      * params: null
      * description: 
        * this method for landing page
      * @return : @view
    */
    public function index ( ) 
    {
    	return view('landing');
    }
    	
}

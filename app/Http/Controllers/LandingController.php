<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

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
      $packages = Package::orderBy('current_price')->get();
    	return view('landing.main' , [
          'packages' => $packages,
      ]);
    }
    	
}

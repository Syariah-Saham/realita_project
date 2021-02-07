<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	
	    
	    
	    /**
	      * route: member/dashboard
	      * method: get
	      * params: null
	      * description: 
	        * this method will return dashboard member
	      * @return : @var view
	    */
	    public function index () 
	    {
	    	return view('dashboard');
	    }
	    	    
}

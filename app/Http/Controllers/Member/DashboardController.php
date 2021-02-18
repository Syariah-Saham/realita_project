<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Member;
use Auth;


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
    	$packages = Package::get();
    	$status = Member::where('user_id' , Auth::id())->count();
    	if(!$status){
    		$package_id = Package::where('current_price',0)->first()->id;
    		Member::create([
    			'package_id' => $package_id,
    			'user_id' => Auth::id(),
    		]);
    	}
    	
    	return view('dashboard' , ['packages' => $packages]);
    }
	    	    
}

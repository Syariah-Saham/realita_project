<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    
    
    
    /**
      * route: /member/report
      * method: get
      * params: null
      * description: 
        * this method will show form to search report
      * @return : @var view
    */
    public function index () 
    {
    	return view('vendor.member.report');
    }
    	
}

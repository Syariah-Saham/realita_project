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

    public function contact(Request $request)
    {
      $request->validate([
        'email' => 'required|email',
        'name' => 'required|string|min:2|max:30',
        'message' => 'required|string|min:2|max:1000',
      ]);

      $link = 'mailto:info@realita.syariahsaham.id?subject=Info Realita&body=' . $request->message;
      return redirect($link);
    }
    	
}

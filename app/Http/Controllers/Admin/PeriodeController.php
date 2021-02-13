<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PeriodeReport;

class PeriodeController extends Controller
{
    
    
    
    /**
      * route: /admin/periode/create
      * method: get
      * params: null
      * description: 
        * this method for create new periode
      * @return : @var vie
    */
    public function create () 
    {
    	$periodes = PeriodeReport::get();
    	return view('vendor.admin.periode-create' , ['periodes' => $periodes]);
    }
 	
 	  
 	  
 	  /**
 	    * route: admin/periode/create
 	    * method: post
 	    * params: periode
 	    * description: 
 	      * this method for store data new periode
 	    * @return : @var redirect
 	  */
 	  public function store (Request $request) 
 	  {
 	  	$request->validate([
 	  		'year' => 'required|string|min:2|max:20',
 	  	]);

 	  	PeriodeReport::create($request->all());

 	  	return redirect(url()->previous())->with('add' , 'Data berhasil ditambahkan!');
 	  }



 	  
 	  
 	  /**
 	    * route: admin/periode/{periode}
 	    * method: delete
 	    * params: periode
 	    * description: 
 	      * this method for destroy data periode
 	    * @return : @var redirect
 	  */
 	  public function destroy (Request $request , PeriodeReport $periode) 
 	  {
 	  	$periode->delete();
 	  	return redirect(url()->previous())->with('delete' , 'Data berhasil dihapus!');
 	  }
 	  	
 	  	  
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Industry;

class IndustryController extends Controller
{
    
    
    
    /**
      * route: admin/sector/industry
      * method: get
      * params: null
      * description: 
        * this method for create new industry
      * @return : @var view
    */
    public function create () 
    {
      $industries = Industry::get();
    	return view('vendor.admin.industry-create' , [
              'industries' => $industries,
            ]);
    }
    	

    
    
    /**
      * route: admin/industry/create
      * method: post
      * params: industry
      * description: 
        * this method for store industry
      * @return : @var redirect
    */
    public function store (Request $request) 
    {
      $request->validate([
        'industry' => 'required|min:4|max:100',
      ]);

      Industry::create($request->all());

      return redirect(url()->previous())->with('add' , 'Data berhasil ditambahkan!');
    }
      

    
    
    /**
      * route: admin/industry/{industry}
      * method: delete
      * params: industry
      * description: 
        * this method for destroy data industry
      * @return : @var redirect
    */
    public function destroy (Request $request , Industry $industry) 
    {
      $industry->delete();
      return redirect(url()->previous())->with('delete' , 'Data berhasil dihapus!');
    }
      
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sector;

class SectorController extends Controller
{
    
    
    
    /**
      * route: admin/sector/create
      * method: get
      * params: null
      * description: 
        * this method for create new sector
      * @return : @var view
    */
    public function create () 
    {
      $sectors = Sector::get();
    	return view('vendor.admin.sector-create' , [
                    'sectors' => $sectors,
                ]);
    }


    
    
    /**
      * route: admin/sector/create
      * method: post
      * params: sector
      * description: 
        * this method for store data new sector
      * @return : @var view
    */
    public function store (Request $request) 
    {
      $request->validate([
        'sector' => 'required|min:4|max:30',
      ]);

      Sector::create($request->all());

      return redirect(url()->previous())->with('add' , 'Data berhasil ditambahkan!');
    }


    
    
    /**
      * route: admin/sector/{sector}
      * method: delete
      * params: id
      * description: 
        * this method for delete sector
      * @return : @var redirect
    */
    public function destroy (Request $request , Sector $sector) 
    {
      $sector->delete();
      return redirect(url()->previous())->with('delete' , 'Data berhasil dihapus!');
    }
      
      
    	
}

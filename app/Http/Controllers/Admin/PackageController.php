<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Package;
use App\Models\Payment;

class PackageController extends Controller
{
    
    
    
    /**
      * route: admin/package
      * method: get
      * params: null
      * description: 
        * this method will return view package
      * @return : @var view
    */
    public function index () 
    {
    	$packages = Package::get();
      $payments = Payment::WHERE('status' , 'pending')->get();
    	return view('vendor.admin.package' , [
            'packages' => $packages,
            'payments' => $payments,
          ]);
    }


    
    
    /**
      * route: admin/package/create
      * method: get
      * params: null
      * description: 
        * this method will view form package
      * @return : @var view
    */
    public function create () 
    {
    	return view('vendor.admin.package-create');
    }
    	
   	
   	
   	
   	/**
   	  * route: admin/package/create
   	  * method: post
   	  * params: name , description , original_price , current_price , report , screening , compare
   	  * description: 
   	    * this method for create new package
   	  * @return : @var redirect
   	*/
   	public function store (Request $request) 
   	{
   		$request->validate([
				'name'           => 'required|min:2|max:25|string',
				'description'    => 'required|min:3|max:50|string',
				'original_price' => 'nullable',
				'current_price'  => 'required|min:0',
				'report'         => 'required|min:1|numeric',
				'screening'      => 'required|min:1|numeric',
				'compare'        => 'required|min:1|max:5|numeric',
   		]);
   		$data = collect($request->all())->map(function($value,  $key) {
   			if(Str::contains($key , 'price')) {
	   			return (int)str_replace('.', '', $value);
	   		} else { return $value; }
   		});

   		Package::create($data->toArray());

   		return redirect('admin/package')->with('add' , 'Paket berhasil ditambahkan!');
   	}



   	
   	
   	/**
   	  * route: admin/package/{package}
   	  * method: delete
   	  * params: package
   	  * description: 
   	    * 	this method for destroy row in table packages
   	  * @return : @var redirect
   	*/	
   	public function destroy (Request $request , Package $package) 
   	{
   		$package->delete();
   		return redirect(url()->previous())->with('delete' , 'Data berhasil dihapus!');
   	}


   	
   	
   	/**
   	  * route: admin/package/{package}/edit
   	  * method: get
   	  * params: package
   	  * description: 
   	    * this method will return form edit
   	  * @return : @var view
   	*/
   	public function edit (Request $request , Package $package) 
   	{
   		return view('vendor.admin.package-edit' , ['package' => $package]);
   	}

   	
   	
   	/**
   	  * route: admin/package/{package}
   	  * method: put
   	  * params: params
   	  * description: 
   	    * this method for update package
   	  * @return : @var redirect
   	*/
   	public function update (Request $request , Package $package) 
   	{
   		$request->validate([
				'name'           => 'required|min:2|max:25|string',
				'description'    => 'required|min:3|max:50|string',
				'original_price' => 'nullable',
				'current_price'  => 'required|min:0',
				'report'         => 'required|min:1|numeric',
				'screening'      => 'required|min:1|numeric',
				'compare'        => 'required|min:1|max:5|numeric',
   		]);
   		$data = collect($request->all())->map(function($value,  $key) {
   			if(Str::contains($key , 'price')) {
	   			return (int)str_replace('.', '', $value);
	   		} else { return $value; }
   		});

   		$package->update($data->toArray());

   		return redirect('admin/package')->with('update' , 'Paket berhasil diupdate!');
   	}
   		
   		
   		
   		
}

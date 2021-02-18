<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    
    
    
    /**
      * route: admin/bank
      * method: get
      * params: null
      * description: 
        * this method will return view list bank
      * @return : @var view
    */
    public function index () 
    {
    	$banks = Bank::latest()->get();
    	return view('vendor.admin.bank' , ['banks' => $banks]);
    }
    	

    
    
    /**
      * route: admin/bank
      * method: post
      * params: name , card_number , bank
      * description: 
        * this method for create new bank
      * @return : @var redirect
    */
    public function store (Request $request) 
    {
    	$request->validate([
			'name'        => 'required|min:3|max:40|string',
			'card_number' => 'required|min:4|max:35|string',
			'bank'        => 'required|max:30|string',
    	]);

    	Bank::create($request->all());

    	return redirect(url()->previous())->with('add' , 'Data berhasil ditambahkan!');
    }
    	

    
    
    /**
      * route: admin/bank/{bank}
      * method: delete
      * params: bank
      * description: 
        * this method for destroy row in table banks
      * @return : @var redirect
    */
    public function destroy (Request $request , Bank $bank) 
    {
    	$bank->delete();
    	return redirect(url()->previous())->with('delete' , 'Data berhasil dihapus!');
    }
    	
}

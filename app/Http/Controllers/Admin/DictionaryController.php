<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dictionary;

class DictionaryController extends Controller
{
    
    
    
    /**
      * route: admin/dictionary
      * method: get
      * params: null
      * description: 
        * this method will return inside dictionary
      * @return : @var view
    */
    public function index () 
    {
    	$items = Dictionary::orderBy('keyword')->get();
    	return view('vendor.admin.dictionary' , [
    		'items' => $items,
    	]);
    }


    
    
    /**
      * route: admin/dictionary
      * method: post
      * params: keyword , description
      * description: 
        * this mehtod for add new dictionary
      * @return : @var redirect
    */
    public function store (Request $request) 
    {
    	$request->validate([
			'keyword'     => 'required|min:1|max:50|unique:dictionaries',
			'description' => 'required|min:3|max:500',
    	]);

    	Dictionary::create($request->all());

    	return redirect(url()->previous())->with('add' , 'Data berhasil ditambahkan!' );
    }


    
    
    
    /**
      * route: admin/dictionary/update
      * method: put
      * params: id , keyword , description
      * description: 
        * this method for update dictionary
      * @return : @var array
    */
    public function update (Request $request) 
    {
      $request->validate([
      'id' => 'required|numeric',
      'editKeyword'     => 'required|min:1|max:50',
      'editDescription' => 'required|min:3|max:500',
      ]);
      Dictionary::where('id' , $request->id)->update([
        'keyword'     => $request->editKeyword,
        'description' => $request->editDescription,
      ]);

      return redirect(url()->previous())->with('update' , 'Data berhasil diupdate');
    }
      


    
    
    /**
      * route: admin/dictionary/{dictionary}
      * method: delete
      * params: dictionary
      * description: 
        * this method for destroy dictionary
      * @return : @var redirect
    */
    public function destroy (Request $request , Dictionary $dictionary) 
    {
      $dictionary->delete();

      return redirect(url()->previous())->with('delete' , 'Data berhasil dihapus!');
    }
      
    	
}

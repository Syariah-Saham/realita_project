<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
	protected $view;
    /**
      * Middleware for this controller
      *
      * @return void
    */
    public function __construct()
    {
      $this->middleware(['role_admin']);
      $this->view = 'vendor.admin.';
    }
    
    
    /**
      * route: admin/admin
      * method: get
      * params: null
      * description: 
        * this method will return list admin
      * @return : @view
    */
    public function index () 
    {
    	$admins = User::where('role_id' , 1)->paginate(10);
    	return view($this->view.'admin' , ['admins' => $admins]);
    }



    
    
    /**
      * route: admin/admin/create
      * method: get
      * params: null
      * description: 
        * this method for cretae new admin
      * @return : @var array
    */
    public function create () 
    {
    	return view($this->view.'admin-add');
    }


    
    
    /**
      * route: admin/admin
      * method: post
      * params: name , email , password
      * description: 
        * this method for store data admin
      * @return : @var array
    */
    public function store (Request $request) 
    {
    	$request->validate([
			'name'     => 'required|min:3|max:25|string',
			'email'    => 'required|unique:users',
			'password' => 'required|string|min:3|max:25|confirmed',
    	]);

    	User::create([
			'role_id'  => 1,
			'name'     => $request->name,
			'email'    => $request->email,
			'password' => Hash::make($request->password),
    	]);

    	return redirect('admin/admin')->with('add' , 'Data berhasil ditambahkan!');
    }



    
    
    /**
      * route: admin/admin/{id}
      * method: delete
      * params: id
      * description: 
        * this method for delete admin
      * @return : @var array
    */
    public function destroy (Request $request , $id) 
    {
    	User::destroy($id);

    	return redirect(url()->previous())->with('delete' , 'Data berhasil dihapus!');
    }
    	
    	
    	
    	
}

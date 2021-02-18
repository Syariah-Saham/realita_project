<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{
    protected $view;
   	/**
   	  * Middleware for this controller
   	  *
   	  * @return void
   	*/
   	public function __construct()
   	{
   	  $this->middleware(['auth:sanctum']);
   	  $this->view = 'vendor.admin.';
   	}
    
    
    /**
      * route: admin/dashboard
      * method: get
      * params: null
      * description: 
        * this method will return view dashboard admin
      * @return : @var view
    */
    public function index () 
    {
      $members = User::where('role_id',2)->get();
    	return view($this->view.'dashboard' , ['members' => $members]);
    }
}

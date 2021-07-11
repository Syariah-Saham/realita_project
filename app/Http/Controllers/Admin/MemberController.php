<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MemberController extends Controller
{
    
    
    
    /**
      * route: /admin/member
      * method: get
      * params: null
      * description: 
        * this method will return list member
      * @return : @var view
    */
    public function index () 
    {
      $members = User::where('role_id' , 2)->where('email_verified_at' , '!=' , null)->paginate(15);
      return view('vendor.admin.member' , ['members' => $members]);
    }
      


    
    
    /**
      * route: /admin/member/status
      * method: put
      * params: id , status
      * description: 
        * this method for update status member
      * @return : @var redirect
    */
    public function status (Request $request , User $member) 
    {
    	$member->update(['status' => $request->status]);
    	return redirect(url()->previous())->with('update' , 'Status member berhasil diubah!');
    }
    	


    
    
    /**
      * route: admin/member/{member}
      * method: delete
      * params: member
      * description: 
        * this method for destroy data member
      * @return : @var redirect
    */
    public function destroy (Request $request , User $member) 
    {
      $member->delete();

      return redirect(url()->previous())->with('delete' , 'Data berhasil dihapus!');
    }
      
}

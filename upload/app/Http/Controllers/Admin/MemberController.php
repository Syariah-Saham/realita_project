<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MemberController extends Controller
{
    
    
    
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
    	
}

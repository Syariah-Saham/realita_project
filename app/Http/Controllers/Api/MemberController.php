<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MemberController extends Controller
{
    /**
         * route	:	 /api/members
         * method	:	 get
         * params	:	 null
         * description	:
              * this method will return list members
         * @return	:	 array
    */
    public function index()
    {
        $members = User::where('role_id' , 2)->select('id', 'name', 'email')->get();
        return response($members,200);
    }

    /**
         * route	:	 /api/members
         * method	:	 post
         * params	:	 null
         * description	:
              * this method for create new member
         * @return	:	 status
    */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|min:3|max:25|string',
            'email'    => 'required|unique:users',
            'password' => 'required|string|min:3|max:25|confirmed',
        ]);

        $member = User::create([
            'role_id'  => 2,
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response($member, 201);
    }

    /**
         * route	:	 /api/members/{id}
         * method	:	 get
         * params	:	 id
         * description	:
              * this method for show detail member
         * @return	:	 array
    */
    public function show(Request $request , $id)
    {
        $member = User::find($id);
        if(!$member) return response("Data tidak ditemukan" , 404);
        return response($member,200);
    }

    /**
         * route	:	 /api/members/{id}
         * method	:	 delete
         * params	:	 id
         * description	:
              * this method for destroy record in table users when role is member
         * @return	:	 status
    */
    public function destroy(Request $request , $id)
    {
        User::destroy($id);
        return response([
            "message" => "Data berhasil dihapus",
        ],200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    /**
         * route	:	 /api/admins
         * method	:	 get
         * params	:	 null
         * description	:
              * this method will return list admins
         * @return	:	 array
    */
    public function index()
    {
        $admins = User::where('role_id' , 1)->select('id' , 'name' , 'email')->get();
        return response($admins,200);
    }

    /**
         * route	:	 /api/admins
         * method	:	 post
         * params	:	 null
         * description	:
              * this method for create new admin
         * @return	:	 array
    */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|min:3|max:25|string',
            'email'    => 'required|unique:users',
            'password' => 'required|string|min:3|max:25|confirmed',
        ]);

        $admin = User::create([
            'role_id'  => 1,
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response($admin , 201);
    }

    /**
         * route	:	 /api/admins/{id}
         * method	:	 get
         * params	:	 id
         * description	:
              * this method will return detail admin
         * @return	:	 array
    */
    public function show(Request $request , $id)
    {
        $admin = User::find($id);
        if(!$admin) return response("Data tidak ditemukan", 404 );
        return response($admin , 200);
    }

    /**
         * route	:	 /api/admins/{id}
         * method	:	 delete
         * params	:	 id
         * description	:
              * this method for destroy record user when role is admin
         * @return	:	 status
    */
    public function destroy(Request $request , $id)
    {
        User::destroy($id);
        return response([
            "message" => "Data berhasil dihapus!",
            "user_id" => $id,
        ] , 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    /**
         * route	:	 /api/package
         * method	:	 get
         * params	:	 null
         * description	:
              * this method will return list packages
         * @return	:	 array
    */
    public function index()
    {
        $packages = Package::get();
        $packages = $packages->map(function($package) {
            return collect($package)->except('created_at', 'updated_at')->toArray();
        });
        return response($packages);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\Package;
use App\Helpers\StatisticDate;

class RoleMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // check role user login
        if(Auth::user()->role_id !== 2) {
            abort(403);
        }

        // in user don't have data membr
        $status = Member::where('user_id' , Auth::id())->count();
    	if(!$status){
            $package_id = Package::where('current_price',0)->first()->id;
            
            // create data member
    		Member::create([
                'package_id' => $package_id,
                'user_id'    => Auth::id(),
    		]);

        $statistic = StatisticDate::get();
        $statistic->update([
          'free' => $statistic->free + 1,
        ]);
    	}
        
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class MaintenanceMode
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
        $check = Setting::where('key' , 'maintenance')->first()->value;
        if($check === 'true') {
            if(Auth::user()->email === 'bj.angel119@gmail.com') {
                return $next($request);
            }
            
            abort(503);
        }
        return $next($request);
    }
}

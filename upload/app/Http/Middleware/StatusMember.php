<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusMember
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
        if(Auth::user()->status !== 'confirmed') {
            abort(403 , 'Akun Anda masih belum dikonfirmasi oleh Administrator. Mohon tunggu beberapa saat.');
        }
        return $next($request);
    }
}

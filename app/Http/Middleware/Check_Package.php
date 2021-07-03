<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Package;
use App\Models\Watchlist;
use Carbon\Carbon;

class Check_Package
{
    public function carbon ($date) 
    {
        return Carbon::parse($date);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $finish_date = Auth::user()->member->finish_date;
        dump($finish_date);
        if($finish_date !== 'free' && $finish_date !== 'unlimited') {
            $check = now() >= $this->carbon($finish_date . ' 23:59:59');
            if($check) {
                $package_free_id = Package::where('name' , 'FREE!')->first()->id;
                Auth::user()->member->update([
                    'package_id' => $package_free_id,
                    'start_date' => 'free',
                    'finish_date' => 'free',
                ]);

                $member = Auth::user()->member;
                $watchlist = $member->watchlist;
                $package_free = Package::where('name' , 'FREE!')->first();
                if($watchlist->count() > $package_free->watchlist) {
                    $max_item = $package_free->watchlist;
                    $own_item  = $watchlist->count();
                    $del_item = $own_item - $max_item;
                    $item_delete = $watchlist->reverse()->take($del_item);
                    foreach($item_delete as $item) {
                        Watchlist::destroy($item->id);
                    }
                }
                return redirect('member/dashboard');
            }
        }

        return $next($request);
    }
}

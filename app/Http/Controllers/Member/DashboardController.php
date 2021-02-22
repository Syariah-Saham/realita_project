<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Member;
use App\Models\Stock;
use App\Models\Watchlist;
use App\Helpers\StatisticDate;
use Auth;
use Str;


class DashboardController extends Controller
{
	
	    
	    
    /**
      * route: member/dashboard
      * method: get
      * params: null
      * description: 
        * this method will return dashboard member
      * @return : @var view
    */
    public function index () 
    {
      $data   = Stock::select('code_issuers')->get();
      $code = [];
      foreach ($data as $value) {
        array_push($code, $value->code_issuers);
      }

    	$status = Member::where('user_id' , Auth::id())->count();
    	if(!$status){
    		$package_id = Package::where('current_price',0)->first()->id;
    		Member::create([
          'package_id' => $package_id,
          'user_id'    => Auth::id(),
    		]);

        $statistic = StatisticDate::get();
        $statistic->update([
          'free' => $statistic->free + 1,
        ]);
    	}


      $wathcs = Watchlist::where('member_id' , Auth::user()->member->id)->get();
    	
    	return view('dashboard' , [
        'codes'  => json_encode($code),
        'wathcs' => $wathcs,
      ]);
    }


    
    
    /**
      * route: /member/dashboard
      * method: post
      * params: code
      * description: 
        * this method for add new watch list
      * @return : @var redirect
    */
    public function addWatchlist (Request $request) 
    {
      $request->validate([
        'code' => 'required|string|size:4',
      ]);

      $member = Auth::user()->member;
      $totalWatch = $member->watchlist->count();
      $package = $member->package;
      if(!Str::contains($package->name , 'Expert')) {
        $max = $package->watchlist;
        if($totalWatch >= $max) {
          return redirect('member/package');
        }
      }

      $stock = Stock::where('code_issuers' , $request->code)->get();
      if($stock->count() === 0) {
        return redirect(url()->previous());
      }

      $memberId = Auth::user()->member->id;
      $stockId  = $stock->first()->id;

      $check = Watchlist::where('member_id' , $memberId)
                          ->where('stock_id' , $stockId)
                          ->count();
      if(!$check) {
        Watchlist::create([
          'member_id' => $memberId,
          'stock_id'  => $stockId,
        ]);
      }

      return redirect(url()->previous())->with('add' , 'Data berhasil ditambahkan!');
    }



    
    
    /**
      * route: member/dashboard/{watchlist}
      * method: delete
      * params: wathclist
      * description: 
        * this method for destroy watchlist
      * @return : @var redirect
    */
    public function destroy (Request $request , Watchlist $watchlist) 
    {
      $watchlist->delete();

      return redirect(url()->previous())->with('delete' , 'Data berhasil dihapus!');
    }
      
      
	    	    
}

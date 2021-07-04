<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Member;
use App\Models\Stock;
use App\Models\Watchlist;
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
          return redirect(url()->previous())->with('sorry' , 'Maaf , status akun Anda masih '.$package->name.' . Anda hanya bisa menambahkan maksimal '. $max .' emiten. Untuk membuka fitur lengkap silahkan pilih paket lain.');
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

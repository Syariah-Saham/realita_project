<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Member;
use Auth;

class CompareController extends Controller
{
    
    
    
    /**
      * route: member/compare
      * method: get
      * params: null
      * description: 
        * this method will return view comparison
      * @return : @var view
    */
    public function index () 
    {
      $data   = Stock::select('code_issuers')->get();
      $code = [];
      foreach ($data as $value) {
        array_push($code, $value->code_issuers);
      }
    	return view('vendor.member.compare',[
          'codes'       => json_encode($code),
          'list_data' => json_encode([]),
      ]);
    }


    
    
    /**
      * route: member/compare/find
      * method: get
      * params: list_data , keyword
      * description: 
        * this method for compare
      * @return : @var view
    */
    public function compare (Request $request) 
    {
      $length = json_decode($request->list_data);
      $maxCompare = Member::where('user_id' , Auth::id())->first()->package->compare;

      if(count($length) > 5) {
        return redirect(url()->previous())->with('failed' , 'Sudah mencapai jumlah maksimal');
      } else if(count($length) > $maxCompare) {
        return redirect('member/package');
      }

      $data   = Stock::select('code_issuers')->get();
      $code = [];
      foreach ($data as $value) {
        array_push($code, $value->code_issuers);
      }

      $items = collect([]);
      foreach (json_decode($request->list_data) as $stock) {
        $stock = Stock::where('code_issuers' , $stock)->first();
        if(!$stock) {
          return redirect(url()->previous());
        }
        $ratio = $stock->report->last()->ratio;
        $item = [
          'ticker' => $stock->code_issuers,
          'sharia' => $stock->sharia,
          'cr'     => $ratio->current_ratio,
          'dn'     => $ratio->dividend_nominal,
          'dy'     => $ratio->dividend_yield,
          'dp'     => $ratio->dividend_payout,
          'np'     => $ratio->net_profit,
          'bv'     => $ratio->book_value,
          'dar'    => $ratio->debt_asset_ratio,
          'der'    => $ratio->debt_equity_ratio,
          'roa'    => $ratio->return_of_assets,
          'roe'    => $ratio->return_of_equity,
          'npm'    => $ratio->net_profit_margin,
          'per'    => $ratio->price_to_earning_ratio,
          'pbv'    => $ratio->price_to_book_value,
        ];
        $items->push($item);
      }
      
      return view('vendor.member.compare',[
          'codes'     => json_encode($code),
          'list_data' => $request->list_data,
          'items'     => $items,
      ]);
    }
      
    	
}

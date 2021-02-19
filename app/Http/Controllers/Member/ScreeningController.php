<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\FinanceRatio;
use App\Models\PeriodeReport;
use Auth;

class ScreeningController extends Controller
{
    
    public function op($op)
    {
      if($op === 'up') {
        return '>=';
      } else if($op === 'down') {
        return '<=';
      } else {
        return '!=';
      }
    }
    
    /**
      * route: member/screening
      * method: get
      * params: null
      * description: 
        * this method will return view screening
      * @return : @var view
    */
    public function index () 
    {
    	return view('vendor.member.screening');
    }
    	

    
    
    /**
      * route: member/screening/search
      * method: post
      * params: params
      * description: 
        * this method for filter stock
      * @return : @var view
    */
    public function screening (Request $request) 
    {
      if(!isset($request->data_query)) {
        $query = collect($request->all())->map(function($item , $key) {
          if($key !== '_token') {
            if(Str::contains($key , 'option')) {
              return $this->op($item);
            } else {
              if($item === null) {
                return 0;
              } else {
                return $item;
              }
            }
          }
        });
      } else {
        $query = collect(json_decode($request->data_query));
      }

      $ratios = collect([]);
      foreach ($query as $key => $value) {
        if(!Str::contains($key , 'option') && $key !== '_token' && $value !== 0) {
          $ratios->push($key);
        }  
      }

      $periode_id = PeriodeReport::get()->last()->id;
      $data_ratio = FinanceRatio::where('current_ratio' , $query['option_cr'] , $query['cr'])
                                ->where('dividend_nominal' , $query['option_ds'] , $query['ds'])
                                ->where('dividend_yield' , $query['option_dy'] , $query['dy'])
                                ->where('dividend_payout' , $query['option_dp'] , $query['dp'])
                                ->where('net_profit' , $query['option_np'] , $query['np'])
                                ->where('book_value' , $query['option_bv'] , $query['bv'])
                                ->where('debt_asset_ratio' , $query['option_dar'] , $query['dar'])
                                ->where('debt_equity_ratio' , $query['option_der'] , $query['der'])
                                ->where('return_of_assets' , $query['option_roa'] , $query['roa'])
                                ->where('return_of_equity' , $query['option_roe'] , $query['roe'])
                                ->where('net_profit_margin' , $query['option_npm'] , $query['npm'])
                                ->where('price_to_earning_ratio' , $query['option_per'] , $query['per'])
                                ->where('price_to_book_value' , $query['option_pbv'] , $query['pbv'])
                    ->get();

      $collections = collect([]);
      $maxScreening = Auth::user()->member->package->screening;

      foreach($data_ratio as $data) {
        if($data->report->periode_id === $periode_id && $collections->count() < $maxScreening) {
          $collections->push($data->report->stock);
        }
      } 
      
      $collections = $collections->sortBy('code_issuers');
      if(!isset($_GET['page'])) {
        $_GET['page'] = 1;
      }
      $items  = $collections->forPage($_GET['page'] , 15);
      $pages = ceil($collections->count() / 15);

      return view('vendor.member.screening' , [
            'items'       => $items,
            'pages'       => $pages,
            'total_items' => $collections->count(),
            'query'       => json_encode($query),
            'ratios'      => $ratios,
      ]);
    }
      
}

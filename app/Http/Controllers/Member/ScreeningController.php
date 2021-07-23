<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\FinanceRatio;
use App\Models\PeriodeReport;
use Auth;
use App\Helpers\Number;

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

    public function percent ($number) 
    {
      return ($number * 100) . '%'; 
    }


    public function query_free ($query) 
    {
      $query = collect($query);
      $query->prepend('!=' , 'option_cr');
      $query->prepend(null , 'cr');
      $query->prepend('!=' , 'option_ds');
      $query->prepend(null , 'ds');
      $query->prepend('!=' , 'option_dy');
      $query->prepend(null , 'dy');
      $query->prepend('!=' , 'option_dp');
      $query->prepend(null , 'dp');
      $query->prepend('!=' , 'option_np');
      $query->prepend(null , 'np');
      $query->prepend('!=' , 'option_bv');
      $query->prepend(null , 'bv');
      $query->prepend('!=' , 'option_dar');
      $query->prepend(null , 'dar');
      $query->prepend('!=' , 'option_der');
      $query->prepend(null , 'der');
      $query->prepend('!=' , 'option_roa');
      $query->prepend(null , 'roa');
      $query->prepend('!=' , 'option_roe');
      $query->prepend(null , 'roe');
      $query->prepend('!=' , 'option_npm');
      $query->prepend(null , 'npm');
      return $query;
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
                return null;
              } else {
                $percent = collect([ 'roa', 'roe' , 'dy' , 'dp' , 'npm']);
                if($percent->contains($key)) {
                  return (int)$item / 100;
                }
                return $item;
              }
            }
          }
        });
      } else {
        $query = collect(json_decode($request->data_query));
      }
      $package_name = Auth::user()->member->package->name;
      if($package_name === 'FREE!') {
        $query = $this->query_free($query);
      }
      
      $ratios = collect([]);
      foreach ($query as $key => $value) {
        if(!Str::contains($key , 'option') && $key !== '_token' && $value !== null) {
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
      foreach($data_ratio as $data) {
        if($data->report->periode_id === $periode_id) {
          $data2 = collect([
              'code_issuers'           => $data->report->stock->code_issuers,
              'name'                   => $data->report->stock->name,
              'current_ratio'          => Number::float($data->current_ratio),
              'dividend_nominal'       => Number::float($data->dividend_nominal),
              'dividend_yield'         => $this->percent($data->dividend_yield),
              'dividend_payout'        => $this->percent($data->dividend_payout),
              'net_profit'             => Number::float($data->net_profit),
              'book_value'             => Number::float($data->book_value),
              'debt_asset_ratio'       => Number::float($data->debt_asset_ratio),
              'debt_equity_ratio'      => Number::float($data->debt_equity_ratio),
              'return_of_assets'       => $this->percent($data->return_of_assets),
              'return_of_equity'       => $this->percent($data->return_of_equity),
              'net_profit_margin'      => $this->percent($data->net_profit_margin),
              'price_to_earning_ratio' => Number::float($data->price_to_earning_ratio),
              'price_to_book_value'    => Number::float($data->price_to_book_value)
          ]);
          if($query['pbv'] !== null && $data->price_to_book_value != 0) {
            $collections->push($data2);
          } else if($query['pbv'] === null) {
            $collections->push($data2);
          }
        }
      }
      
      $sortKey = (isset($_GET['sortKey'])) ? $_GET['sortKey'] : 'code_issuers';
      $sortStatus = (isset($_GET['sortStatus'])) ? $_GET['sortStatus'] : 'asc';

      $_GET['sortKey'] = $sortKey;
      $_GET['sortStatus'] = $sortStatus;

      $collections = ($sortStatus === 'asc') ? $collections->sortBy($sortKey) : $collections->sortByDesc($sortKey);

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

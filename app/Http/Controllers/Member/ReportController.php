<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Member;
use App\Models\HistoryReport;
use App\Models\HistoryItem;
use Auth;

class ReportController extends Controller
{
  /**
    * Middleware for this controller
    *
    * @return void
  */
  public function __construct()
  {
    $this->periodes = collect([]);
  }

  public function number ($number) 
  {
    return number_format($number , 0,',','.');
  }

  public function setAsset ($array) 
  {
    $current  = [];
    $ncurrent = [];
    $total    = [];
    $growth   = [];
    $json     = [];

    foreach ($array as $data) {
      array_push($current, $this->number($data->current));
      array_push($ncurrent, $this->number($data->n_current));
      array_push($total, $this->number($data->total));
      array_push($growth, $data->growth . '%');
      array_push($json, $data->total);
    }

    $this->assets = $json;

    return [
      'current'  => $current,
      'ncurrent' => $ncurrent,
      'total'    => $total,
      'growth'   => $growth, 
    ];
  }

  public function setLiabilities ($array) 
  {
    $current  = [];
    $ncurrent = [];
    $total    = [];
    $growth   = [];
    $json     = [];

    foreach ($array as $data) {
      array_push($current, $this->number($data->current));
      array_push($ncurrent, $this->number($data->n_current));
      array_push($total, $this->number($data->total));
      array_push($growth, $data->growth . '%');
      array_push($json, $data->total);
    }

    $this->liabilities = $json;

    return [
      'current'  => $current,
      'ncurrent' => $ncurrent,
      'total'    => $total,
      'growth'   => $growth, 
    ];
  }

  public function setEquity ($array) 
  {
    $parent         = [];
    $not_controller = [];
    $total          = [];
    $growth         = [];
    $json           = [];

    foreach ($array as $data) {
      array_push($parent, $this->number($data->parent));
      array_push($not_controller, $this->number($data->not_controller));
      array_push($total, $this->number($data->total));
      array_push($growth, $data->growth . '%');
      array_push($json, $data->total);
    }

    $this->equity = $json;

    return [
      'parent'         => $parent,
      'not_controller' => $not_controller,
      'total'          => $total,
      'growth'         => $growth, 
    ];
  }

  public function setProfit ($array) 
  {
    $revenue           = [];
    $revenue_growth    = [];
    $net_profit        = [];
    $net_profit_growth = [];
    $json              = [];
    $jsonnp              = [];

    foreach ($array as $data) {
      array_push($revenue, $this->number($data->revenue));
      array_push($revenue_growth, $data->revenue_growth . '%');
      array_push($net_profit, $this->number($data->net_profit));
      array_push($net_profit_growth, $data->net_profit_growth . '%');
      array_push($json, $data->revenue);
      array_push($jsonnp, $data->net_profit);
    }

    $this->revenue    = $json;
    $this->net_profit = $jsonnp;

    return [
      'revenue'           => $revenue,
      'revenue_growth'    => $revenue_growth,
      'net_profit'        => $net_profit,
      'net_profit_growth' => $net_profit_growth,
    ];
  }

  public function setRatio ($array) 
  {
    $cr  = [];
    $dn  = [];
    $dy  = [];
    $dp  = [];
    $np  = [];
    $bv  = [];
    $dar = [];
    $der = [];
    $roa = [];
    $roe = [];
    $npm = [];
    $per = [];
    $pbv = [];

    $jsonPER = [];
    $jsonPBV = [];

    foreach ($array as $data) {
      array_push($cr, $data->current_ratio);
      array_push($dn, $data->dividend_nominal);
      array_push($dy, $data->dividend_yield . '%');
      array_push($dp, $data->dividend_payout . '%');
      array_push($np, $data->net_profit);
      array_push($bv, $data->book_value);
      array_push($dar, $data->debt_asset_ratio);
      array_push($der, $data->debt_equity_ratio);
      array_push($roa, $data->return_of_assets . '%');
      array_push($roe, $data->return_of_equity . '%');
      array_push($npm, $data->net_profit_margin . '%');
      array_push($per, $data->price_to_earning_ratio);
      array_push($pbv, $data->price_to_book_value);
      array_push($jsonPER, $data->price_to_earning_ratio);
      array_push($jsonPBV, $data->price_to_book_value);
    }

    $this->per = $jsonPER;
    $this->pbv = $jsonPBV;

    return [
      'cr'  => $cr , 'dn'  => $dn  , 'dy'  => $dy  , 'dp'  => $dp,
      'np'  => $np , 'bv'  => $bv  , 'dar' => $dar , 'der' => $der,
      'roa' => $roa, 'roe' => $roe , 'npm' => $npm , 'per' => $per,
      'pbv' => $pbv, 
    ];
  }

  public function setCostStock ($array) 
  {
    $cost        = [];
    $total_stock = [];

    foreach ($array as $data) {
      array_push($cost, $this->number($data->cost));
      array_push($total_stock, $this->number($data->total_stock));
    }

    return [
      'cost'        => $cost,
      'total_stock' => $total_stock,
    ];
  }

  public function setJson () 
  {
    $json = [
      'periodes'  => $this->periodes->toArray(),
      'asset'     => $this->assets,
      'liability' => $this->liabilities,
      'equity'    => $this->equity,
      'revenue'   => $this->revenue,
      'netProfit' => $this->net_profit, 
      'per'       => $this->per,
      'pbv'       => $this->pbv,
    ];

    return json_encode($json);
  }
    
    
    
    /**
      * route: /member/report
      * method: get
      * params: null
      * description: 
        * this method will show form to search report
      * @return : @var view
    */
    public function index () 
    {
      $data   = Stock::select('code_issuers')->get();
      $code = [];
      foreach ($data as $value) {
        array_push($code, $value->code_issuers);
      }

    	return view('vendor.member.report' , [
          'codes'       => json_encode($code),
      ]);
    }

    public function find (Request $request) 
    {
        $data   = Stock::select('code_issuers')->get();
        $code = [];
        foreach ($data as $value) {
          array_push($code, $value->code_issuers);
        }

        $stock = Stock::where('code_issuers' , $request->keyword)->first();
        if(!$stock) {
          return redirect(url()->previous())->with('failed' , 'Data tidak ditemukan!');
        }

        $memberId = Auth::user()->member->id;

        $findHistory = HistoryReport::where('member_id' , $memberId)
                                    ->where('month' , date('m'))
                                    ->where('year' , date('Y'))
                                    ->count();
        if(!$findHistory) {
          HistoryReport::create([
            'member_id' => $memberId,
            'month'     => date('m'),
            'year'      => date('Y'),
          ]);
        }

        $history = HistoryReport::where('member_id' , $memberId)
                                  ->where('month' , date('m'))
                                  ->where('year' , date('Y'))
                                  ->first();
        $maxEmiten   = Auth::user()->member->package->report;
        $packageMember = Auth::user()->member->package->name;
        $historyItem = $history->item->count();
        $checkItem = $history->item->where('stock_id' , $stock->id)->count();

        if($historyItem < $maxEmiten) {
          if(!$checkItem) {
            HistoryItem::create([
              'history_id' => $history->id,
              'stock_id'   => $stock->id,
            ]);
          }
        } else {
          if(!$checkItem) {
            return redirect(url()->previous())->with('sorry' , 'Maaf , status akun Anda masih '.$packageMember.' . Anda hanya bisa melakukan maksimal '. $maxEmiten .' emiten. Untuk membuka fitur lengkap silahkan pilih paket lain.');
          } 
        }
        
        $reports = $stock->report->reverse()->take(5);
        $reports = $reports->reverse();

        $assets      = collect([]);
        $liabilities = collect([]);
        $equity      = collect([]);
        $profits     = collect([]);
        $ratios      = collect([]);
        $costs       = collect([]);

        foreach ($reports as $report) {
          $this->periodes->push($report->periode->year);
          $assets->push($report->balance->asset);
          $liabilities->push($report->balance->liability);
          $equity->push($report->balance->equity);

          $profits->push($report->profit);
          $ratios->push($report->ratio);
          $costs->push($report->coststock);
        }
        $assets      = $this->setAsset($assets);
        $liabilities = $this->setLiabilities($liabilities);
        $equity      = $this->setEquity($equity);
        $profits     = $this->setProfit($profits);
        $ratios      = $this->setRatio($ratios);
        $costs       = $this->setCostStock($costs);

        $json = $this->setJson();
        
        return view('vendor.member.report' , [
            'codes'       => json_encode($code),
            'data'        => true,
            'stock'       => $stock,
            'reports'     => $reports,
            'periodes'    => $this->periodes,
            'assets'      => $assets,
            'liabilities' => $liabilities,
            'equity'      => $equity,
            'profits'     => $profits,
            'ratios'      => $ratios,
            'costs'       => $costs,
            'json'        => $json,
        ]);
    }
    	
}

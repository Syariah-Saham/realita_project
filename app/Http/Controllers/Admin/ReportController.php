<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Admin\ListReportResource;
use App\Models\PeriodeReport;
use App\Models\Stock;
use App\Models\FinanceReport;
use App\Models\BalanceSheet;
use App\Models\Asset;
use App\Models\Liability;
use App\Models\Equity;
use App\Models\ProfitLoss;
use App\Models\FinanceRatio;
use App\Models\CostStock;
use App\Helpers\Number;

class ReportController extends Controller
{
    
    
    
    /**
      * route: admin/report
      * method: get
      * params: null
      * description: 
        * this method will return view report
      * @return : @var view
    */
    public function index () 
    {
      $data   = Stock::select('code_issuers')->get();
      $code = [];
      foreach ($data as $value) {
        array_push($code, $value->code_issuers);
      }
      
      $reports = FinanceReport::latest()->paginate(50);
    	return view('vendor.admin.report' , [
        'reports' => $reports,
        'codes'       => json_encode($code),
      ]);
    }


    
    
    /**
      * route: admin/report/create
      * method: get
      * params: null
      * description: 
        * this mehtod for show form new port
      * @return : @var view
    */
    public function create () 
    {
      $periodes = PeriodeReport::get();
      $stocks = Stock::get();
    	return view('vendor.admin.report-create' , [
        'periodes' => $periodes,
        'stocks' => $stocks,
      ]);
    }


    public function store (Request $request) 
    {
      $request->validate([
        'stock_id'               => 'required',
        'periode_id'             => 'required',
        'asset_current'          => 'required',
        'asset_n_current'        => 'required',
        'asset_total'            => 'required',
        'asset_growth'           => 'required',
        'liability_current'      => 'required',
        'liability_n_current'    => 'required',
        'liability_total'        => 'required',
        'liability_growth'       => 'required',
        'equity_parent'          => 'required',
        'equity_not_controller'  => 'required',
        'equity_total'           => 'required',
        'equity_growth'          => 'required',
        'revenue_total'          => 'required',
        'revenue_growth'         => 'required',
        'net_profit_total'       => 'required',
        'net_profit_growth'      => 'required',
        'current_ratio'          => 'required',
        'dividend_nominal'       => 'required',
        'dividend_yield'         => 'required',
        'dividend_payout'        => 'required',
        'net_profit'             => 'required',
        'book_value'             => 'required',
        'debt_asset_ratio'       => 'required',
        'debt_equity_ratio'      => 'required',
        'return_of_assets'       => 'required',
        'return_of_equity'       => 'required',
        'net_profit_margin'      => 'required',
        'price_to_earning_ratio' => 'required',
        'price_to_book_value'    => 'required',
        'cost'                   => 'required',
        'total_stock'            => 'required',
      ]);

      // create report
      FinanceReport::create([
        'stock_id' => $request->stock_id,
        'periode_id' => $request->periode_id,
      ]);
      $report_id = FinanceReport::get()->last()->id;

      //Balance Sheet
      BalanceSheet::create(['report_id' => $report_id]);
      $balance_id = BalanceSheet::get()->last()->id;

      Asset::create([
        'balance_id' => $balance_id,
        'current'    => $request->asset_current,
        'n_current'  => $request->asset_n_current,
        'total'      => $request->asset_total,
        'growth'     => $request->asset_growth,
      ]);

      Liability::create([
        'balance_id' => $balance_id,
        'current'    => $request->liability_current,
        'n_current'  => $request->liability_n_current,
        'total'      => $request->liability_total,
        'growth'     => $request->liability_growth,
      ]);

      Equity::create([
        'balance_id'     => $balance_id,
        'parent'         => $request->equity_parent,
        'not_controller' => $request->equity_not_controller,
        'total'          => $request->equity_total,
        'growth'         => $request->equity_growth,
      ]);

      // Profit Loss
      ProfitLoss::create([
        'report_id'         => $report_id,
        'revenue'           => $request->revenue_total,
        'revenue_growth'    => $request->revenue_growth,
        'net_profit'        => $request->net_profit_total,
        'net_profit_growth' => $request->net_profit_growth,
      ]);


      // Finance Ratio
      FinanceRatio::create([
        'report_id'              => $report_id,
        'current_ratio'          => $request->current_ratio,
        'dividend_nominal'       => $request->dividend_nominal,
        'dividend_yield'         => $request->dividend_yield,
        'dividend_payout'        => $request->dividend_payout,
        'net_profit'             => $request->net_profit,
        'book_value'             => $request->book_value,
        'debt_asset_ratio'       => $request->debt_asset_ratio,
        'debt_equity_ratio'      => $request->debt_equity_ratio,
        'return_of_assets'       => $request->return_of_assets,
        'return_of_equity'       => $request->return_of_equity,
        'net_profit_margin'      => $request->net_profit_margin,
        'price_to_earning_ratio' => $request->price_to_earning_ratio,
        'price_to_book_value'    => $request->price_to_book_value,
      ]);

      // Cost Stock
      CostStock::create([
        'report_id'   => $report_id,
        'cost'        => $request->cost,
        'total_stock' => $request->total_stock,
      ]);

      return redirect('/admin/report')->with('add' , 'Data berhasil ditambahkan!');
    }

















    public function __construct()
    {
      $this->periodes = collect([]);
    }

    public function number ($number) 
    {
      return number_format($number , 0,',','.');
    }

    public function percent ($number) 
    {
      return ($number * 100) . '%'; 
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
        array_push($growth, $this->percent($data->growth));
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
        array_push($growth, $this->percent($data->growth));
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
        array_push($growth, $this->percent($data->growth));
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
        array_push($revenue_growth, $this->percent($data->revenue_growth));
        array_push($net_profit, $this->number($data->net_profit));
        array_push($net_profit_growth, $this->percent($data->net_profit_growth));
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
        array_push($cr, Number::float($data->current_ratio));
        array_push($dn, Number::float($data->dividend_nominal));
        array_push($dy, Number::percent($data->dividend_yield));
        array_push($dp, Number::percent($data->dividend_payout));
        array_push($np, Number::float($data->net_profit));
        array_push($bv, Number::float($data->book_value));
        array_push($dar, Number::float($data->debt_asset_ratio));
        array_push($der, Number::float($data->debt_equity_ratio));
        array_push($roa, Number::percent($data->return_of_assets));
        array_push($roe, Number::percent($data->return_of_equity));
        array_push($npm, Number::percent($data->net_profit_margin));
        array_push($per, Number::float($data->price_to_earning_ratio));
        array_push($pbv, Number::float($data->price_to_book_value));
        array_push($jsonPER, Number::float($data->price_to_earning_ratio));
        array_push($jsonPBV, Number::float($data->price_to_book_value));
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
    
    

    public function find(Request $request)
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

       /* manage financial reports */
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

        return view('vendor.admin.stock-detail' , [
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
    
    

    public function destroy(Request $request, FinanceReport $report)
    {
      $report->delete();
      return redirect(url()->previous())->with('destroy' , 'Data berhasil dihapus!');
    }


    public function edit(Request $request , Stock $stock , $periode)
    {
      $periode = PeriodeReport::where('year' , $periode)->first();
      
      $report = FinanceReport::where('stock_id' , $stock->id)
                              ->where('periode_id' , $periode->id)
                              ->first();
      
      $balance = $report->balance;
      $profit = $report->profit;
      $ratio = $report->ratio;
               
      return view('vendor.admin.report-edit' , [
        'stock' => $stock,
        'periode' => $periode,
        'balance' => $balance,
        'profit' => $profit,
        'ratio' => $ratio,
      ]);
    }
    	

}

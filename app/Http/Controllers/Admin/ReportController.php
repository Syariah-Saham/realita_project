<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    	return view('vendor.admin.report');
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
    	

}

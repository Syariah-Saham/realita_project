<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\Industry;
use App\Models\Stock;

use App\Models\Setting;

use App\Models\PeriodeReport;
use App\Models\FinanceReport;

use App\Models\BalanceSheet;
use App\Models\Asset;
use App\Models\Liability;
use App\Models\Equity;
use App\Models\ProfitLoss;
use App\Models\CostStock;
use App\Models\FinanceRatio;

class ImportDataController extends Controller
{
  public function __construct() {
    $this->sectors    = collect([]);
    $this->industries = collect([]);
    $this->stocks     = collect([]);

    $this->dataAsset = collect([]);
    $this->dataLiabilitas = collect([]);
    $this->dataEquitas = collect([]);
    $this->keyAsset = collect(['aset_lancar' , 'aset_nonlancar' , 'total_aset' , 'growth_aset']);
    $this->keyLiabilitas = collect(['liabilitas_jkpd' , 'libilitas_jkpj','total_liabilitas','growth_lia']);
    $this->keyEquitas = collect(['eq_pemilik_entitas_induk' , 'eq_non_pengendali' , 'total_ekuitas' , 'growth_ekuitas']);

    $this->dataProfit = collect([]);
    $this->keyProfit = collect(['pendapatan' , 'growth_in' , 'laba_bersih' , 'growth_lb']);

    $this->costStock = collect([]);
    $this->keyCostStock = collect(['harga' , 'jumlah_saham']);

    $this->ratio = collect([]);
    $this->keyRatio = collect([
      'CR','DIV','div_y','div_p','Laba_bersih/saham','NB','DAR','DER','ROA','ROE','NPM','PER','PBV'
    ]);
  }

  public function zero ($number) 
  {
    if($number !== '#N/A' && $number !== '-' && $number !== '') {
      return $number;
    } else {
      return 0;
    }
  }

  public function getSector () 
  {
    foreach ($this->stocks as $data) {
      $data = explode('.', $data->sector);
      $sector = trim($data[1]); 
      if(!$this->sectors->contains($sector)) {
        $this->sectors->push($sector);
      }
    }
  }

  public function setSector()
  {
    foreach ($this->sectors as $sector) {
      $status = Sector::where('sector' , $sector)->get()->count();
      if($status === 0) {
        Sector::create(['sector' => $sector]);
      }
    }
  }

  public function getIndustry()
  {
    foreach ($this->stocks as $data) {
      $data = explode('.', $data->industry);
      $industry = trim($data[1]); 
      if(!$this->industries->contains($industry)) {
        $this->industries->push($industry);
      }
    }
  }

  public function setIndustry () 
  {
    foreach ($this->industries as $industry) {
      $status = Industry::where('industry' , $industry)->get()->count();
      if($status === 0){
        Industry::create(['industry' => $industry]);
      }
    }
  }

  public function setStock () 
  {
    foreach ($this->stocks as $key => $stock) {
      $sector = trim(explode('.', $stock->sector)[1]);
      $sector_id = Sector::where('sector' , $sector)->get()->first()->id;
      $industry = trim(explode('.', $stock->industry)[1]);
      $industry_id = Industry::where('industry' , $industry)->get()->first()->id;

      $sharia = ($stock->sharia === 'Yes') ? 'true' : 'false';

      $status  = Stock::where('code_issuers' , $stock->code)->get()->count();
      if($status === 0) {
        dump('Saham => ' . $stock->id);
        Stock::create([
          'sector_id'      => $sector_id,
          'industry_id'    => $industry_id,
          'code_issuers'   => $stock->code,
          'name'           => $stock->name,
          'ipo_date'       => substr($stock->ipo_date, 0,10),
          'total_stock'    => 0,
          'capitalization' => $this->zero($stock->capitalization) * 1000000,
          'kurs_report'    => $stock->kurs_report,
          'sharia'         => $sharia,
        ]);
      }
    }
    dump('Complete insert stock');
  }
    
    
    
    /**
      * route: admin/import
      * method: get
      * params: null
      * description: 
        * this method will return view import
      * @return : @var view
    */
    public function index () 
    {
      $maintenance_mode = Setting::where('key' , 'maintenance')->first()->value;
    	return view('vendor.admin.import-data' , [
        'maintenance_mode' => $maintenance_mode,
      ]);
    }
    	

    
    
    /**
      * route: admin/import/stock
      * method: post
      * params: null
      * description: 
        * this method will request api for get data stock
      * @return : @var api
    */
    public function stock () 
    {
      ini_set('max_execution_time', 6000);
      $response = file_get_contents('https://script.googleusercontent.com/macros/echo?user_content_key=vjcHP_xEENxBQFebxDyOTOIGtLmwa3j0FFxdhJxJb8H-tAdf1OICAYE1O8TrRGJD3cGj8BOo9xMSwRns4txcdz7oOdwzlWJ-m5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnPK76bXwNsDtYRaNlFHrlf9-U43CXrvlLrAH9zEoHdSj0qbAyAPsHhfihs5eG06RTld8uduLYkiZIT9G1n9LQ_0Cp1XKia6Wyt24D7ghrsYgnRMvSrRweQw&lib=MTT_G-6P_TeeXHK2lekWiEBJS-FelNKUK');
      $data = json_decode($response)->records;
      dump('Jumlah Data diinput => ' . count($data));
      $this->stocks = $data;
      $this->getSector();
      $this->getIndustry();
      $this->setSector();
      $this->setIndustry();
      $this->setStock();

      return redirect(url()->previous())->with('complete' , 'Data Saham sudah berhasil diimport ke database');
    }


    /* 
      * route: admin/import/stock
      * method: delete
    */
    public function stockReset()
    {
      Stock::whereNotNull('id')->delete();
      return redirect(url()->previous())->with('delete' , 'Data saham berhasil direset!');
    }























    public function setAsset ($balance_id , $data) 
    {
        $status = Asset::where('balance_id',$balance_id)->get()->count();
        if(!$status) {
            Asset::create([
                'balance_id' => $balance_id,
                'current'    => $data['aset_lancar'],
                'n_current'  => $data['aset_nonlancar'],
                'total'      => $data['total_aset'],
                'growth'     => $data['growth_aset'],
            ]);
        }
    }

    public function setLiabilitas ($balance_id , $data) 
    {
        $status = Liability::where('balance_id',$balance_id)->get()->count();
        if(!$status) {
            Liability::create([
                'balance_id' => $balance_id,
                'current'    => $data['liabilitas_jkpd'],
                'n_current'  => $data['libilitas_jkpj'],
                'total'      => $data['total_liabilitas'],
                'growth'     => $data['growth_lia'],
            ]);   
        }
    }
    
    public function setEquity ($balance_id , $data) 
    {
        $status = Equity::where('balance_id',$balance_id)->get()->count();
        if(!$status) {
            Equity::create([
                'balance_id'     => $balance_id,
                'parent'         => $data['eq_pemilik_entitas_induk'],
                'not_controller' => $data['eq_non_pengendali'],
                'total'          => $data['total_ekuitas'],
                'growth'         => $data['growth_ekuitas'],
            ]);
        }
    }

    public function setProfit ($report_id , $data) 
    {
        $status = ProfitLoss::where('report_id' , $report_id)->get()->count();
        if(!$status) {
            ProfitLoss::create([
                'report_id'         => $report_id,
                'revenue'           => $data['pendapatan'],
                'revenue_growth'    => $data['growth_in'],
                'net_profit'        => $data['laba_bersih'],
                'net_profit_growth' => $data['growth_lb'],
            ]);
        }
    }

    public function setCostStock ($report_id , $data) 
    {
        $status = CostStock::where('report_id' , $report_id)->get()->count();
        if(!$status) {
            CostStock::create([
                'report_id'   => $report_id,
                'cost'        => $data['harga'],
                'total_stock' => $data['jumlah_saham'],
            ]);
        }
    }

    public function setRatio ($report_id , $data) 
    {
        $status = FinanceRatio::where('report_id' , $report_id)->get()->count();

        if(!$status) {
            FinanceRatio::create([
                'report_id'              => $report_id,
                'current_ratio'          => $data['CR'],
                'dividend_nominal'       => $data['DIV'],
                'dividend_yield'         => $data['div_y'],
                'dividend_payout'        => $data['div_p'],
                'net_profit'             => $data['Laba_bersih/saham'],
                'book_value'             => $data['NB'],
                'debt_asset_ratio'       => $data['DAR'],
                'debt_equity_ratio'      => $data['DER'],
                'return_of_assets'       => $data['ROA'],
                'return_of_equity'       => $data['ROE'],
                'net_profit_margin'      => $data['NPM'],
                'price_to_earning_ratio' => $data['PER'],
                'price_to_book_value'    => $data['PBV'],
            ]);
        }
    }
    
    /**
      * route: admin/import/report
      * method: post
      * params: null
      * description: 
        * this method will request api for get data report
      * @return : @var redirect
    */
    public function financeReport (Request $request) 
    {
      $request->validate([
        'url' => 'required|string',
        'periode' => 'required|numeric',
      ]);

      /* check data periode is exist or not */
      $check_periode = PeriodeReport::where('year' , $request->periode)->count();
      if(!$check_periode) {
        PeriodeReport::create(['year' => $request->periode]);
      }

      ini_set('max_execution_time', 2000);

      /* 
        url sheet before 
      
        https://script.googleusercontent.com/macros/echo?user_content_key=u3MPmWFsn7bm3GJPzLqzXa2bJ8GK6Iq2A7pRWlY4jH5rMVJFZj6u-Z4UYdXfieSfZjfwbxNsm1rLrK71oxvJDQkI6l5WuVCKm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnCfC5AkYNYU535nKZ-vyjxLaYhl4YtVo3XUdHlxYs3uZeljbCKRFTNIBBwINVBIVAjwj2fMfTjaIHunQVyD6GjTwZams4Dja-d24D7ghrsYgnRMvSrRweQw&lib=MTT_G-6P_TeeXHK2lekWiEBJS-FelNKUK
      */
      
      /* get data form sheet */
      $response = file_get_contents($request->url);
      $data = json_decode($response)->records;
      dump('Sedang Mengambil Data. Proses ini memerlukan waktu beberapa saat. Mohon tunggu sebentar.');
      dump('Loading ....');

      /* foreach data from sheet */
      foreach($data as $key => $stock) {
        dump('Saham '. $stock->ticker .' ke => ' . ($key +1));

        /* find stock, periode and report. if not exist create new data. */
        $stock_id = Stock::where('code_issuers',$stock->ticker)->get()->first()->id;
        $periode_id = PeriodeReport::where('year' , $request->periode)->get()->first()->id;
        $report = FinanceReport::where('stock_id' , $stock_id)
                                ->where('periode_id' , $periode_id);
        if($report->get()->count() === 0){
            FinanceReport::create([
              'stock_id'   => $stock_id,
              'periode_id' => $periode_id,
            ]);
        }
        $report_id = $report->first()->id;

        /* check balance sheet is exists or not */
        $balance = BalanceSheet::where('report_id' , $report_id);
        if($balance->get()->count() === 0) {
            BalanceSheet::create(['report_id' => $report_id]);
        }
        $balance_id = $balance->first()->id;


        /* get data from each stock */
        $asset      = collect([]);
        $liabilitas = collect([]);
        $equitas    = collect([]);
        $dataProfit = collect([]);
        $costStock = collect([]);
        $ratio = collect([]);
        foreach($stock as $key => $value) {
          if($this->keyAsset->contains($key)) {
            $asset->put($key , $this->zero($value));
          }
          if($this->keyLiabilitas->contains($key)) {
            $liabilitas->put($key , $this->zero($value));
          }
          if($this->keyEquitas->contains($key)) {
            $equitas->put($key , $this->zero($value));
          }

          if($this->keyProfit->contains($key)) {
            $dataProfit->put($key , $this->zero($value));
          }
          if($this->keyCostStock->contains($key)) {
            $costStock->put($key , $this->zero($value));
          }

          if($this->keyRatio->contains($key)){
            $ratio->put($key , $this->zero($value));
          }
        }


        /* insert data from sheet to database */
        $this->setAsset($balance_id , $asset);
        $this->setLiabilitas($balance_id , $liabilitas);
        $this->setEquity($balance_id , $equitas);
        $this->setProfit($report_id , $dataProfit);
        $this->setCostStock($report_id , $costStock);
        $this->setRatio($report_id , $ratio);

      }
      dump("Selesai Import");
      return redirect(url()->previous())->with('complete' , 'Laporan Keuangan berhasil diimport ke database');
    }








    public function maintenance(Request $request)
    {
      Setting::where('key' , 'maintenance')->update(['value' => $request->mode]);
      return redirect(url()->previous())->with('switch mode' , 'Mode Maintenance berhasil diubah!');
    }
      
      
}

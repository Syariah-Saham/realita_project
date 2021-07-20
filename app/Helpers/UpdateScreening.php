<?php 
namespace App\Helpers;

use Illuminate\Support\Facades\Log;

use App\Models\Stock;
use App\Models\PeriodeReport;
use App\Models\FinanceReport;
use App\Models\FinanceRatio;

class UpdateScreening
{
    private static $sheet_url = 'https://script.googleusercontent.com/macros/echo?user_content_key=nQE6wOILtM0QXVwYRQn7_DS4RgcR6r1OwhZkR2u-GdOwIlXcaIMqXwejdxAB7Y6_HrWoMyrNA-ZzVLp55nZTZQ0c8ezp_Lhtm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnO4BGAxnmLb0eA-aQpmnRkO7OSQbc4oN8iBJVenerWbbzmBMMVRKRUepkuDmU646l2Hyn-5tzJYrmX3k4r1fDNjjpM6UH1CeSt24D7ghrsYgnRMvSrRweQw&lib=MTT_G-6P_TeeXHK2lekWiEBJS-FelNKUK';
    private static $sheet_url_offline = 'http://localhost:3000/records';

    private static $periode = '2021';
    private static $stocks;
    private static $data_stock;
    private static $ratio;
    private static $report;

    public static function zero ($number) 
    {
        if($number !== '#N/A' && $number !== '-' && $number !== '') {
            return $number;
        } else {
            return 0;
        }
    }

    public static function import()
    {
        /* -- production environment -- */
        $data = file_get_contents(self::$sheet_url);
        $data = json_decode($data)->records; 
        self::$stocks = $data;

        /* -- local environment -- */
        /* $data = file_get_contents(self::$sheet_url_offline);
        $data = json_decode($data);
        self::$stocks = $data; */


        Log::channel('screening')->debug(json_encode(collect([$data])->toArray()[0][1]));
        
        return true;
    }

    public static function mapping()
    {
        foreach(self::$stocks as $data_stock) {
            $stock = Stock::where('code_issuers' , $data_stock->ticker)->get()->first();
            $periode = PeriodeReport::where('year' , self::$periode)->get()->first();
            $report = FinanceReport::where('stock_id' , $stock->id)
                                    ->where('periode_id' , $periode->id);
            
            if($report->get()->count() === 0) {
                new Exception('Finance Report of '. $stock->code_issers . ' not found.');
            }

            /* -- local environment */
            /* if($data_stock->ticker === 'VICI') {
                break;
            } */
            
            self::$data_stock = $data_stock;
            self::$report = $report->first();
            self::getRatio();
        }

        return true;
    }

    public static function getRatio()
    {
        $ratio = collect([]);
        $stock = self::$data_stock;
        
        foreach($stock as $key => $value) {
            $key_ratio = collect([
                'Laba_bersih/saham','NB','PER','PBV'
            ]);

            if($key_ratio->contains($key)) {
                $ratio->put($key , self::zero($value));
            }
        }

        self::$ratio = $ratio;
        self::setRatio();

        return true;
    }

    public static function setRatio()
    {
        $report = self::$report;
        $ratio = self::$ratio;

        if(self::$data_stock->ticker === 'UNVR') {
            dump($ratio);
            dump(FinanceRatio::where('report_id' , $report->id)->first());
        }
        
        FinanceRatio::where('report_id' , $report->id)->update([
            'book_value' => $ratio['NB'],
            'net_profit' => $ratio['Laba_bersih/saham'],
            'price_to_earning_ratio' => $ratio['PER'],
            'price_to_book_value' => $ratio['PBV'],
        ]);

    }

    public static function index()
    {
        ini_set('max_execution_time', 2000);
        
        /* import data from sheet */   
        self::import();
        
        /* mapping data stock */
        self::mapping();
        
        return true;
    }
}

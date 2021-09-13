<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HistoryItem;
use App\Models\HistoryReport;
use App\Models\PeriodeReport;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnualReportController extends Controller
{

    public function __construct()
    {
        $this->periodes = collect([]);
    }

    public function number($number)
    {
        return number_format($number, 0, ',', '.');
    }

    public function percent($number)
    {
        return ($number * 100) . '%';
    }

    public function setAsset($array)
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

    public function setLiabilities($array)
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

    public function setEquity($array)
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

    public function setProfit($array)
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

    public function setRatio($array)
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
            array_push($cr, (float)$data->current_ratio);
            array_push($dn, (float)$data->dividend_nominal);
            array_push($dy, $this->percent($data->dividend_yield));
            array_push($dp, $this->percent($data->dividend_payout));
            array_push($np, (float)$data->net_profit);
            array_push($bv, (float)$data->book_value);
            array_push($dar, (float)$data->debt_asset_ratio);
            array_push($der, (float)$data->debt_equity_ratio);
            array_push($roa, $this->percent($data->return_of_assets));
            array_push($roe, $this->percent($data->return_of_equity));
            array_push($npm, $this->percent($data->net_profit_margin));
            array_push($per, (float)$data->price_to_earning_ratio);
            array_push($pbv, (float)$data->price_to_book_value);
            array_push($jsonPER, (float)$data->price_to_earning_ratio);
            array_push($jsonPBV, (float)$data->price_to_book_value);
        }

        $this->per = $jsonPER;
        $this->pbv = $jsonPBV;

        return [
            'cr'  => $cr, 'dn'  => $dn, 'dy'  => $dy, 'dp'  => $dp,
            'np'  => $np, 'bv'  => $bv, 'dar' => $dar, 'der' => $der,
            'roa' => $roa, 'roe' => $roe, 'npm' => $npm, 'per' => $per,
            'pbv' => $pbv,
        ];
    }

    public function setCostStock($array)
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

    public function setJson()
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
         * route	:	 api/reports
         * method	:	 get
         * params	:	 null
         * description	:
              * this method will return 6 years annual report by ticker
         * @return	:	 array of object
    */
    public function index(Request $request )
    {
        $data   = Stock::select('code_issuers')->get();
        $code = [];
        foreach ($data as $value) {
            array_push($code, $value->code_issuers);
        }

        /* check the data is there or not */
        $stock = Stock::where('code_issuers', $request->ticker)->first();
        if (!$stock) {
            return response([
                "message" => "data tidak ditemukan"
            ] , 400);
        }





        /* check the search history of the user */
        $memberId = Auth::user()->member->id;
        $findHistory = HistoryReport::where('member_id', $memberId)
            ->where('month', date('m'))
            ->where('year', date('Y'))
            ->count();
        if (!$findHistory) {
            HistoryReport::create([
                'member_id' => $memberId,
                'month'     => date('m'),
                'year'      => date('Y'),
            ]);
        }

        $history = HistoryReport::where('member_id', $memberId)
            ->where('month', date('m'))
            ->where('year', date('Y'))
            ->first();
        $maxEmiten   = Auth::user()->member->package->report;
        $packageMember = Auth::user()->member->package->name;
        $historyItem = $history->item->count();
        $checkItem = $history->item->where('stock_id', $stock->id)->count();


        /* create or redirect based on user history */
        if ($historyItem < $maxEmiten) {
            if (!$checkItem) {
                HistoryItem::create([
                    'history_id' => $history->id,
                    'stock_id'   => $stock->id,
                ]);
            }
        } else {
            if (!$checkItem) {
                return response([
                    'message' => 'Maaf , status akun Anda masih ' . $packageMember . ' . Anda hanya bisa melakukan maksimal ' . $maxEmiten . ' emiten. Untuk membuka fitur lengkap silahkan pilih paket lain.',
                ], 400);
            }
        }










        /* manage financial reports */
        $last_periode_id = PeriodeReport::where('year', 2021)->first()->id;
        $reports = $stock->report->where('periode_id', '!=', $last_periode_id)->reverse()->take(5);
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






        // refactory data response
        $stock = collect($stock)->except('report' , 'created_at' , 'updated_at' , 'sector_id' , 'industry_id');

        return response([
            // 'codes'       => $code,
            // 'data'        => true,
            'stock'       => $stock,
            // 'reports'     => $reports,
            'periodes'    => $this->periodes,
            'assets'      => $assets,
            'liabilities' => $liabilities,
            'equity'      => $equity,
            'profits'     => $profits,
            'ratios'      => $ratios,
            'costs'       => $costs,
            // 'json'        => $json,
        ],200);
    }
}

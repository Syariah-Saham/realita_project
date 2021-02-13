<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FinanceRatio;

class FinanceRatio extends Model
{
    use HasFactory;
    protected $fillable = ['report_id' , 'current_ratio' , 'dividend_nominal' , 'dividend_yield' , 'dividend_payout' , 'net_profit' , 'book_value' , 'debt_asset_ratio' , 'debt_equity_ratio' , 'return_of_assets' , 'return_of_equity' , 'net_profit_margin' , 'price_to_earning_ratio' , 'price_to_book_value'];

    public function report () 
    {
    	return $this->belongsTo(FinanceRatio::class , 'report_id');
    }
}

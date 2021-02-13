<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FinanceReport;

class ProfitLoss extends Model
{
    use HasFactory;
    protected $fillable = ['report_id' , 'revenue' ,'revenue_growth' , 'net_profit_growth' , 'net_profit'];

    public function report () 
    {
    	return $this->belongsTo(FinanceReport::class , 'report_id');
    }
}

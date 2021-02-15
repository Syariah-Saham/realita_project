<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PeriodeReport;
use App\Models\Stock;
use App\Models\BalanceSheet;
use App\Models\ProfitLoss;
use App\Models\FinanceRatio;
use App\Models\CostStock;

class FinanceReport extends Model
{
    use HasFactory;
    protected $fillable = ['periode_id' , 'stock_id'];

    public function periode () 
    {
    	return $this->belongsTo(PeriodeReport::class , 'periode_id');
    }

    public function stock () 
    {
    	return $this->belongsTo(Stock::class , 'stock_id');
    }

    public function balance () 
    {
        return $this->hasOne(BalanceSheet::class , 'report_id');
    }

    public function profit () 
    {
        return $this->hasOne(ProfitLoss::class , 'report_id');
    }

    public function ratio () 
    {
        return $this->hasOne(FinanceRatio::class , 'report_id');
    }

    public function coststock () 
    {
        return $this->hasOne(CostStock::class , 'report_id');
    }
}

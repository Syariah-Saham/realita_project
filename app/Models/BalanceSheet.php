<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FinanceReport;
use App\Models\Asset;
use App\Models\Liability;
use App\Models\Equity;


class BalanceSheet extends Model
{
    use HasFactory;
    protected $fillable = ['report_id'];

    public function report () 
    {
    	return $this->belongsTo(FinanceReport::class , 'report_id');
    }

    public function asset () 
    {
    	return $this->hasOne(Asset::class , 'balance_id');
    }

    public function liability () 
    {
    	return $this->hasOne(Liability::class , 'balance_id');
    }

    public function equity () 
    {
        return $this->hasOne(Equity::class , 'balance_id');
    }
}

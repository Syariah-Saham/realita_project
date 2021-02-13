<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PeriodeReport;
use App\Models\Stock;

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
}

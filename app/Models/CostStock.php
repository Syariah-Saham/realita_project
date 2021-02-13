<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FinanceReport;

class CostStock extends Model
{
    use HasFactory;
    protected $fillable = ['report_id' , 'cost' , 'total_stock'];

    public function report () 
    {
    	return $this->belongsTo(FinanceReport::class , 'report_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HistoryReport;
use App\Models\Stock;

class HistoryItem extends Model
{
    use HasFactory;
    protected $fillable = ['history_id' , 'stock_id'];

    public function history () 
    {
    	return $this->belongsTo(HistoryReport::class , 'history_id');
    }

    public function stock () 
    {
    	return $this->belongsTo(Stock::class , 'stock_id');
    }
}

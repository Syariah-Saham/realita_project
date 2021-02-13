<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BalanceSheet;

class Equity extends Model
{
    use HasFactory;
    protected $fillable = ['balance_id' , 'parent' , 'not_controller' , 'total' , 'growth'];

    public function balance () 
    {
    	return $this->belongsTo(BalanceSheet::class , 'balance_id');
    }
}

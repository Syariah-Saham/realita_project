<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BalanceSheet;

class Asset extends Model
{
    use HasFactory;
    protected $fillable = ['balance_id' , 'current' , 'n_current' , 'total' , 'growth'];

    public function balance () 
    {
    	return $this->belongsTo(BalanceSheet::class , 'balance_id');
    }
}

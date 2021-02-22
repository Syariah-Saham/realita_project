<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\Stock;

class Watchlist extends Model
{
    use HasFactory;
    protected $fillable = ['member_id' , 'stock_id'];

    public function member () 
    {
    	return $this->belongsTo(Member::class , 'member_id');
    }

    public function stock () 
    {
    	return $this->belongsTo(Stock::class , 'stock_id');
    }
}

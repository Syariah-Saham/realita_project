<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\HistoryItem;

class HistoryReport extends Model
{
    use HasFactory;
    protected $fillable = ['member_id' , 'month' , 'year'];

    public function member () 
    {
    	return $this->belongsTo(Member::class , 'member_id');
    }

    public function item () 
    {
    	return $this->hasMany(HistoryItem::class , 'history_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class Package extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'description' , 'original_price' , 'current_price' , 'report' , 'screening' , 'compare' , 'watchlist'];

    public function member () 
    {
    	return $this->hasMany(Member::class , 'package_id');
    }
}

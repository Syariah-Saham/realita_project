<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Package;
use App\Models\User;
use App\Models\Watchlist;


class Member extends Model
{
    use HasFactory;
    protected $fillable = ['package_id' , 'user_id'];

    public function package () 
    {
    	return $this->belongsTo(Package::class , 'package_id');
    }

    public function user () 
    {
    	return $this->belongsTo(User::class , 'user_id');
    }

    public function watchlist () 
    {
        return $this->hasMany(Watchlist::class , 'member_id');
    }
}

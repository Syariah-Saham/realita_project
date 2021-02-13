<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;

class Sector extends Model
{
    use HasFactory;
    protected $fillable = ['sector'];

    public function stock () 
    {
    	return $this->hasMany(Stock::class , 'sector_id');
    }
}

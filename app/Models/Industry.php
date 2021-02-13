<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;

class Industry extends Model
{
    use HasFactory;
    protected $fillable = ['industry'];

    public function stock () 
    {
    	return $this->hasMany(Stock::class , 'industry_id');
    }
}

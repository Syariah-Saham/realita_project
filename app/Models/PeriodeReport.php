<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FinanceReport;

class PeriodeReport extends Model
{
    use HasFactory;
    protected $fillable = ['year'];

    public function report () 
    {
    	return $this->hasMany(FinanceReport::class , 'periode_id');
    }
}

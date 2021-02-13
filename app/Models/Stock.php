<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Industry;
use App\Models\Sector;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = ['sector_id' , 'industry_id' , 'code_issuers' , 'ipo_date' , 'total_stock' , 'capitalization' , 'kurs_report' , 'sharia' , 'name'];

    public function industry () 
    {
    	return $this->belongsTo(Industry::class , 'industry_id');
    }

    public function sector () 
    {
    	return $this->belongsTo(Sector::class , 'sector_id');
    }
}

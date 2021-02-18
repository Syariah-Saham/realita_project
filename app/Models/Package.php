<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'description' , 'original_price' , 'current_price' , 'report' , 'screening' , 'compare'];

    
}

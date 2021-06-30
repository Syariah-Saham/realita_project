<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\Bank;
use App\Models\Package;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['member_id' , 'package_id' , 'invoice_id' , 'invoice_url' , 'proof_payment' , 'status'];

    public function member () 
    {
    	return $this->belongsTo(Member::class , 'member_id');
    }

    public function bank () 
    {
    	return $this->belongsTo(Bank::class , 'bank_id');
    }

    public function package () 
    {
        return $this->belongsTo(Package::class , 'package_id');
    }
}

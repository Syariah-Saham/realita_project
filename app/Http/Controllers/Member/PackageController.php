<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Models\Package;
use App\Models\Bank;
use App\Models\Payment;
use Auth;

class PackageController extends Controller
{
    
    
    
    /**
      * route: member/package
      * method: get
      * params: null
      * description: 
        * this method will return list package
      * @return : @var view
    */
    public function index () 
    {
    	$packages = Package::get();
      $payments = Payment::where('member_id' , Auth::user()->member->id)->latest()->get();
    	return view('vendor.member.package' , [
            'packages' => $packages,
            'payments' => $payments,
        ]);
    }


    
    
    /**
      * route: member/package/{package}/buy
      * method: get
      * params: package
      * description: 
        * this method for buy package
      * @return : @var view
    */
    public function buy (Request $request , Package $package) 
    {
      $banks = Bank::get();

      return view('vendor.member.package-buy' , [
              'package' => $package,
              'banks'   => $banks,
      ]);
    }


    
    
    /**
      * route: member/package/{package}/send
      * method: post
      * params: bank_id , proof_payment
      * description: 
        * this method for send proof payment
      * @return : @var redirect
    */
    public function send (Request $request , Package $package) 
    {
      $request->validate([
        'proof_payment' => 'required|file',
      ]);

      $proof = 'Proof_'.date('d-m-Y_').Str::random(40).'.'.$request->proof_payment->getClientOriginalExtension();

      Storage::putFileAs('public/payments' , new File($request->proof_payment) , $proof);

      Payment::create([
        'member_id'     => Auth::user()->member->id,
        'bank_id'       => $request->bank_id,
        'package_id'    => $request->package_id,
        'proof_payment' => $proof,
      ]);

      return redirect('member/package')->with('send' , 'Data berhasil dikirim. Proses ini membutuhkan waktu beberapa saat.  ');
    }


    
    
    /**
      * route: member/package/{package}/download
      * method: get
      * params: package
      * description: 
        * this method for download package
      * @return : @var download
    */
    public function download (Request $request , Payment $payment) 
    {
      $proof = 'public/payments/'.$payment->proof_payment;  
      return Storage::download($proof);
    }
      
      
      
    	
}

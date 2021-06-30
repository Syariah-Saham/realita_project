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
use App\Helpers\StatisticDate;
use Auth;
use Xendit\Xendit;

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

    public function xendit (Request $request , Package $package ) 
    {
      $memberId = Auth::user()->member->id;
      Xendit::setApiKey(env('XENDIT_API_KEY'));

      $params = [
          'external_id'          => 'Eclass_INV_' . Str::random(30),
          'payer_email'          => Auth::user()->email,
          'description'          => $package->name,
          'amount'               => $package->current_price,
          'success_redirect_url' => env('XENDIT_REDIRECT_URL') . '/member/package/'.$package->id.'/xendit/purchase',
      ];

      $check = Payment::where('member_id' , $memberId)
                        ->where('package_id' , $package->id)
                        ->count();

        if(!$check) {
          $createInv = \Xendit\Invoice::create($params);
          Payment::create([
            'member_id'   => $memberId,
            'package_id'    => $package->id,
            'invoice_id'  => $createInv['id'],
            'invoice_url' => $createInv['invoice_url'],
            'status'      => $createInv['status'],
          ]);

          return redirect($createInv['invoice_url']);
        } else {
          $payment = Payment::where('member_id' , $memberId)
                            ->where('package_id' , $package->id)
                            ->first();
          return redirect($payment->invoice_url);
        }
    }



    public function purchase (Request $request , Package $package) 
    {
        $payment = Payment::where('member_id' , Auth::user()->member->id)
                        ->where('package_id' , $package->id)
                        ->first();
        Xendit::setApiKey(env('XENDIT_API_KEY'));
        $inv = \Xendit\Invoice::retrieve($payment->invoice_id);
        $payment->update(['status' => 'confirmed']);
        
        $statistic = StatisticDate::get();
        StatisticDate::member($payment->member_id);
        if(Str::contains($package->name , 'Personal')) {
          $statistic->update([
            'personal' => $statistic->personal + 1,
          ]);
        } else if(Str::contains($package->name , 'Expert')) {
          $statistic->update([
            'expert' => $statistic->expert + 1,
          ]);
        }
        $payment->member->update(['package_id' => $payment->package_id]);


        return redirect('member/package');
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

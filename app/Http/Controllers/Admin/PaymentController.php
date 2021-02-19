<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Payment;
use App\Models\Member;

class PaymentController extends Controller
{
    
    
    
    /**
      * route: admin/payment/
      * method: get
      * params: null
      * description: 
        * this method will show all payment
      * @return : @var view
    */
    public function index () 
    {
    	$payments = Payment::latest()->get();
    	return view('vendor.admin.payment' , ['payments' => $payments]);
    }


    
    
    /**
      * route: admin/payment/payment
      * method: get
      * params: payment
      * description: 
        * this method will show detail data payment
      * @return : @var view
    */
    public function show (Request $request , Payment $payment) 
    {
    	return view('vendor.admin.payment-detail' , ['payment' => $payment]);
    }


    
    
    /**
      * route: admin/payment/{payment}/proof
      * method: get
      * params: payment
      * description: 
        * this method for download proof
      * @return : @var download
    */
    public function proof (Request  $request , Payment $payment) 
    {
    	$proof = 'public/payments/'.$payment->proof_payment;
    	return Storage::download($proof);
    }
    	


    
    
    /**
      * route: admin/payment/{payment}/status
      * method: put
      * params: status
      * description: 
        * this method for update status
      * @return : @var redirect
    */
    public function update (Request $request , Payment $payment) 
    {
    	$payment->update(['status' => $request->status]);
    	if($request->status === 'confirmed') {
	    	$payment->member->update(['package_id' => $payment->package_id]);
    	}

    	return redirect(url()->previous())->with('update' , 'Status berhasil diupdate');
    }
    	
    	
    	
}

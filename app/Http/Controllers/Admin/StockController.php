<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Sector;
use App\Models\Industry;

class StockController extends Controller
{
    
    
    
    /**
      * route: admin/stock
      * method: get
      * params: null
      * description: 
        * this method for show list stock
      * @return : @var view
    */
    public function index () 
    {
      $stocks = Stock::paginate(50);
    	return view('vendor.admin.stock' , [
              'stocks' => $stocks,
      ]);
    }



    
    
    /**
      * route: admin/stock/create
      * method: get
      * params: null
      * description: 
        * this method for show from list
      * @return : @var view
    */
    public function create () 
    {
      $sectors  = Sector::get();
      $industry = Industry::get();
    	return view('vendor.admin.stock-create' , [
                    'sectors' => $sectors,
                    'industries' => $industry,
              ]);
    }


    
    
    /**
      * route: admin/stock/create
      * method: post
      * params: new stock
      * description: 
        * this method for store data new stock
      * @return : @var redirect
    */
    public function store (Request $request) 
    {
      $request->validate([
        'name'           => 'required|min:5|max:100|string',
        'code_issuers'   => 'required|string|size:4|unique:stocks',
        'ipo_date'       => 'required|date',
        'sector_id'         => 'required|numeric',
        'industry_id'       => 'required|numeric',
        'total_stock'    => 'required|numeric',
        'capitalization' => 'required|numeric',
        'kurs_report'    => 'required|string|min:2|max:30',
        'sharia'         => 'required',
      ]);

      Stock::create($request->all());

      return redirect('/admin/stock')->with('add' , 'Data berhasil ditambahkan!');
    }
      

    
    
    /**
      * route: /admin/stock/{stock}
      * method: delete
      * params: stock
      * description: 
        * this method for destroy data stock in database
      * @return : @var redirect
    */
    public function destroy (Request $request , Stock $stock) 
    {
      $stock->delete();
      return redirect(url()->previous())->with('delete' , 'Data berhasil dihapus!');
    }
      
}

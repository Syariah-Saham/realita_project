<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Package;
use App\Models\Statistic;

class DashboardController extends Controller
{
    protected $view;
   	/**
   	  * Middleware for this controller
   	  *
   	  * @return void
   	*/
   	public function __construct()
   	{
   	  $this->middleware(['auth:sanctum']);
   	  $this->view = 'vendor.admin.';
   	}

    public function month ($month) 
    {
      $months = ['Januari' , 'Februari' , 'Maret' , 'April' , 'Mei' , 'Juni' , 'Juli' , 'Agustus' , 'September' , 'Oktober' , 'November' , 'Desember'];

      return $months[$month - 1];
    }
    
    
    /**
      * route: admin/dashboard
      * method: get
      * params: null
      * description: 
        * this method will return view dashboard admin
      * @return : @var view
    */
    public function index () 
    {
      $members = User::where('role_id',2)->get();

      $packages = Package::get();
      $dataPackages = [];
      foreach ($packages as $key => $package) {
        array_push($dataPackages, $package->member->count());
      }


      $chart = collect([]);
      $syears = Statistic::get()->groupBy('year')->sort()->reverse();
      foreach ($syears as $data) {
        foreach($data->groupBy('month')->sort()->reverse() as $value) {
          $free     = 0;
          $personal = 0;
          $expert   = 0;
          foreach($value as $v) {
            $free     += $v->free;
            $personal += $v->personal;
            $expert   += $v->expert;
          }

          $month = $this->month($value[0]->month);
          $package = [
            'free'     => $free,
            'personal' => $personal,
            'expert'   => $expert,
          ];
          $chart->put($month , $package);
        }
      }
      $chart = $chart->take(5)->reverse();

    	return view($this->view.'dashboard' , [
          'members'      => $members,
          'dataPackages' => $dataPackages,
          'chart'        => $chart,
      ]);
    }
}

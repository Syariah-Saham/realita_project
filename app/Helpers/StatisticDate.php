<?php 
namespace App\Helpers;

use Illuminate\Support\Str;
use App\Models\Statistic;
use App\Models\Member;


class StatisticDate
{
    public static function get()
    {
        $statistic = Statistic::where('day' , date('d'))
        			->where('month' , date('m'))
        			->where('year' , date('Y'));
       if(!$statistic->get()->count()) {
	       	Statistic::create([
					'day'   => date('d'),
					'month' => date('month'),
					'year'  => date('year'),
	       	]);
       }

      	return Statistic::where('day', date('d'))
      					->where('month' , date('m'))
      					->where('year' , date('Y'))
      					->first();
    }

    public static function member($member_id)
    {
        $old = Member::find($member_id)->package->name;
        $statistic = Statistic::where('day' , date('d'))
                                ->where('month' , date('m'))
                                ->where('year' , date('Y'))
                                ->first();

        if(Str::contains($old , 'Gratis')) {
            Statistic::where('day' , date('d'))
                                ->where('month' , date('m'))
                                ->where('year' , date('Y'))->update([
              'free' => $statistic->free -1,
            ]);
        } else if(Str::contains($old , 'Personal')) {
          Statistic::where('day' , date('d'))
                                ->where('month' , date('m'))
                                ->where('year' , date('Y'))->update([
            'personal' => $statistic->personal - 1,
          ]);
        }
    }
}

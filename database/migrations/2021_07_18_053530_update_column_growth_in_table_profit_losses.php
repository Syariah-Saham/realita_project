<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnGrowthInTableProfitLosses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profit_losses', function (Blueprint $table) {
            $table->decimal('revenue_growth' , $precision = 10 , $scale = 4)->change();
            $table->decimal('net_profit_growth' , $precision = 10 , $scale = 4)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profit_losses', function (Blueprint $table) {
            $table->decimal('revenue_growth' , $precision = 10 , $scale = 2)->change();
            $table->decimal('net_profit_growth' , $precision = 10 , $scale = 2)->change();
        });
    }
}

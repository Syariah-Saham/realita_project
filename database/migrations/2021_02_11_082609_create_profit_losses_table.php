<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfitLossesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profit_losses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id');
            $table->unsignedBigInteger('revenue');
            $table->decimal('revenue_growth' , $precision = 4 , $scale = 2);
            $table->unsignedBigInteger('net_profit');
            $table->decimal('net_profit_growth' , $precision = 4 , $scale = 2);
            $table->timestamps();

            $table->foreign('report_id')->references('id')->on('finance_reports')->onDelete('cascade');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profit_losses' , function(Blueprint $table) {
            $table->dropForeign(['report_id']);
        });
        Schema::dropIfExists('profit_losses');
    }
}

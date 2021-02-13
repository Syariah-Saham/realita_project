<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id');
            $table->foreignId('stock_id');
            $table->timestamps();

            $table->foreign('periode_id')->references('id')->on('periode_reports')->onDelete('cascade');
            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('finance_reports', function(Blueprint $table) {
            $table->dropForeign(['periode_id' , 'stock_id']);
        });
        Schema::dropIfExists('finance_reports');
    }
}

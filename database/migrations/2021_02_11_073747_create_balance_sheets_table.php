<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalanceSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_sheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id');
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
        Schema::table('balance_sheets' , function(Blueprint $table) {
            $table->dropForeign(['report_id']);
        });
        Schema::dropIfExists('balance_sheets');
    }
}

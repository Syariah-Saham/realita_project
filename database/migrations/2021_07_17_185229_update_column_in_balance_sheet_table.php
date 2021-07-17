<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnInBalanceSheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->decimal('growth' , $precision = 10 , $scale = 4)->change();
        });
        Schema::table('liabilities', function (Blueprint $table) {
            $table->decimal('growth' , $precision = 10 , $scale = 4)->change();
        });
        Schema::table('equities', function (Blueprint $table) {
            $table->decimal('growth' , $precision = 10 , $scale = 4)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->decimal('growth' , $precision = 10 , $scale = 2)->change();
        });
        Schema::table('liabilities', function (Blueprint $table) {
            $table->decimal('growth' , $precision = 10 , $scale = 2)->change();
        });
        Schema::table('equities', function (Blueprint $table) {
            $table->decimal('growth' , $precision = 10 , $scale = 2)->change();
        });
    }
}

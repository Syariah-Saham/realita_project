<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('balance_id');
            $table->bigInteger('current');
            $table->bigInteger('n_current');
            $table->bigInteger('total');
            $table->decimal('growth' , $precision = 4 , $scale = 2);
            $table->timestamps();

            $table->foreign('balance_id')->references('id')->on('balance_sheets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('liabilities' , function(Blueprint $table) {
            $table->dropForeign(['balance_id']);
        });
        Schema::dropIfExists('liabilities');
    }
}

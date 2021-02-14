<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('balance_id');
            $table->bigInteger('current');
            $table->bigInteger('n_current');
            $table->bigInteger('total');
            $table->decimal('growth' , $precision = 10 , $scale = 2);
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
        Schema::table('assets' , function(Blueprint $table) {
            $table->dropForeign(['balance_id']);
        });
        Schema::dropIfExists('assets');
    }
}

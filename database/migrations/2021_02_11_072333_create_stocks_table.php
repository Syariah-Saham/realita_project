<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sector_id');
            $table->foreignId('industry_id');
            $table->char('code_issuers',5);
            $table->string('name');
            $table->timestamp('ipo_date');
            $table->unsignedBigInteger('total_stock');
            $table->unsignedBigInteger('capitalization');
            $table->string('kurs_report');
            $table->enum('sharia' , ['true' , 'false']);
            $table->timestamps();

            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');
            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stocks' , function(Blueprint $table) {
            $table->dropForeign(['sector_id' , 'industry_id']);
        });
        Schema::dropIfExists('stocks');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnFinanceRatioForIncreateScale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('finance_ratios', function (Blueprint $table) {
            $table->decimal('current_ratio' , $precision = 10 , $scale = 4)->change();
            $table->decimal('dividend_nominal' , $precision = 10 , $scale = 4)->change();
            $table->decimal('dividend_yield' , $precision = 10 , $scale = 4)->change();
            $table->decimal('dividend_payout' , $precision = 10 , $scale = 4)->change();
            $table->decimal('net_profit' , $precision = 10 , $scale = 4)->change();
            $table->decimal('book_value' , $precision = 10 , $scale = 4)->change();
            $table->decimal('debt_asset_ratio' , $precision = 10 , $scale = 4)->change();
            $table->decimal('debt_equity_ratio' , $precision = 10 , $scale = 4)->change();
            $table->decimal('return_of_assets' , $precision = 10 , $scale = 4)->change();
            $table->decimal('return_of_equity' , $precision = 10 , $scale = 4)->change();
            $table->decimal('net_profit_margin' , $precision = 10 , $scale = 4)->change();
            $table->decimal('price_to_earning_ratio' , $precision = 10 , $scale = 4)->change();
            $table->decimal('price_to_book_value' , $precision = 10 , $scale = 4)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('finance_ratios', function (Blueprint $table) {
            $table->decimal('current_ratio' , $precision = 10 , $scale = 2)->change();
            $table->decimal('dividend_nominal' , $precision = 10 , $scale = 2)->change();
            $table->decimal('dividend_yield' , $precision = 10 , $scale = 2)->change();
            $table->decimal('dividend_payout' , $precision = 10 , $scale = 2)->change();
            $table->decimal('net_profit' , $precision = 10 , $scale = 2)->change();
            $table->decimal('book_value' , $precision = 10 , $scale = 2)->change();
            $table->decimal('debt_asset_ratio' , $precision = 10 , $scale = 2)->change();
            $table->decimal('debt_equity_ratio' , $precision = 10 , $scale = 2)->change();
            $table->decimal('return_of_assets' , $precision = 10 , $scale = 2)->change();
            $table->decimal('return_of_equity' , $precision = 10 , $scale = 2)->change();
            $table->decimal('net_profit_margin' , $precision = 10 , $scale = 2)->change();
            $table->decimal('price_to_earning_ratio' , $precision = 10 , $scale = 2)->change();
            $table->decimal('price_to_book_value' , $precision = 10 , $scale = 2)->change();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPortfolioDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portfolio_details', function (Blueprint $table) {
            $table->foreign('portfolio_id', 'portfolio_details_ibfk_1')->references('id')->on('portfolios')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portfolio_details', function (Blueprint $table) {
            $table->dropForeign('portfolio_details_ibfk_1');
        });
    }
}

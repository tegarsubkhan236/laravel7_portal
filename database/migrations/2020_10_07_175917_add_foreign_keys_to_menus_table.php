<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->foreign('parent_id', 'menus_ibfk_1')->references('id')->on('menus')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('page_id', 'menus_ibfk_2')->references('id')->on('pages')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign('menus_ibfk_1');
            $table->dropForeign('menus_ibfk_2');
        });
    }
}

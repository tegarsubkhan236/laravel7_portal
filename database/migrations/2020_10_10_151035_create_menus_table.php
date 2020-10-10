<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 100);
            $table->string('link', 100)->nullable();
            $table->tinyInteger('is_blank')->default(0);
            $table->tinyInteger('is_visibility')->default(0);
            $table->integer('page_id')->nullable()->index('page_id');
            $table->integer('parent_id')->nullable()->index('parent_id');
            $table->integer('position')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}

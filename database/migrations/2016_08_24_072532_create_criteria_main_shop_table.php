<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriteriaMainShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria_main_shops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('criteria_main_score');
            $table->datetime('criteria_main_shop_datetime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('criteria_main_shop');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('setting_show_all_project');
            $table->string('setting_ent_time_create_project');
            $table->integer('current_year');
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
        Schema::drop('all_setting');
    }
}

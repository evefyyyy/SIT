<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_project_id');
            $table->string('group_project_eng_name');
            $table->string('group_project_th_name');
            $table->integer('group_project_recommend');
            $table->integer('group_project_approve');
            $table->integer('project_num');
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
        Schema::drop('group_project');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_project_detail',10000);
            $table->string('group_project_short_detail',1000);
            $table->string('tools_detail');
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
        Schema::drop('projects_detail');
    }
}

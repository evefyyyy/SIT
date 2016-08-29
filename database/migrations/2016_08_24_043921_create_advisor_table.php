<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvisorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advisors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prefix');
            $table->string('advisor_fname');
            $table->string('advisor_lname');
            $table->integer('admin_authen');
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
        Schema::drop('advisors');
    }
}

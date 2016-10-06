<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_staff', function (Blueprint $table) {
        $table->increments('id');
        $table->string('staff_username');
        $table->string('staff_password');
        $table->rememberToken();
        $table->timestamps();
        )};
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

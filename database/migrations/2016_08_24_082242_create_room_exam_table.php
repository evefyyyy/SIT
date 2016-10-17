<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms_exam', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_exam_name');
            $table->string('exam_datetime');
            $table->datetime('exam_starttime');
            $table->datetime('exam_endtime');
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
        Schema::drop('room_exam');
    }
}

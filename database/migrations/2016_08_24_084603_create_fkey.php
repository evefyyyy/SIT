<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::table('students', function ($table) {
        $table->integer('user_type_id')->unsigned();
        $table->foreign('user_type_id')->references('id')->on('user_types');
    });

    Schema::table('admins', function ($table) {
        $table->integer('user_type_id')->unsigned();
        $table->foreign('user_type_id')->references('id')->on('user_types');
    });

    Schema::table('advisors', function ($table) {
        $table->integer('user_type_id')->unsigned();
        $table->foreign('user_type_id')->references('id')->on('user_types');
    });

    Schema::table('best_projects', function ($table) {
        $table->integer('advisor_id')->unsigned();
        $table->foreign('advisor_id')->references('id')->on('advisors');
        $table->integer('group_project_id')->unsigned();
        $table->foreign('group_project_id')->references('id')->on('group_projects');
    });
     Schema::table('criteria_main_shops', function ($table) {
        $table->integer('type_id')->unsigned();
        $table->foreign('type_id')->references('id')->on('types');
        $table->integer('criteria_main_id')->unsigned();
        $table->foreign('criteria_main_id')->references('id')->on('criteria_mains');
    });

    Schema::table('criterias', function ($table) {
        $table->integer('criteria_main_shop_id')->unsigned();
        $table->foreign('criteria_main_shop_id')->references('id')->on('criteria_main_shops');
        $table->integer('criteria_sub_id')->unsigned();
        $table->foreign('criteria_sub_id')->references('id')->on('criteria_subs');
        $table->integer('advisor_id')->unsigned();
        $table->foreign('advisor_id')->references('id')->on('advisors');
        $table->integer('group_project_id')->unsigned();
        $table->foreign('group_project_id')->references('id')->on('group_projects');
    });
    Schema::table('dday', function ($table) {
        $table->integer('group_project_id')->unsigned();
        $table->foreign('group_project_id')->references('id')->on('group_projects');
    });

    Schema::table('files_upload', function ($table) {
        $table->integer('news_id')->unsigned();
        $table->foreign('news_id')->references('id')->on('news');
    });

    Schema::table('group_projects', function ($table) {
        $table->integer('category_id')->unsigned();
        $table->foreign('category_id')->references('id')->on('categories');
        $table->integer('type_id')->unsigned();
        $table->foreign('type_id')->references('id')->on('types');
    });

    Schema::table('pictures', function ($table) {
        $table->integer('group_project_id')->unsigned();
        $table->foreign('group_project_id')->references('id')->on('group_projects');
        $table->integer('picture_type_id')->unsigned();
        $table->foreign('picture_type_id')->references('id')->on('picture_type');
    });

    Schema::table('project_advisors', function ($table) {
        $table->integer('group_project_id')->unsigned();
        $table->foreign('group_project_id')->references('id')->on('group_projects');
        $table->integer('advisor_id')->unsigned();
        $table->foreign('advisor_id')->references('id')->on('advisors');
    });

    Schema::table('project_proposals', function ($table) {
        $table->integer('group_project_id')->unsigned();
        $table->foreign('group_project_id')->references('id')->on('group_projects');
        $table->integer('proposal_id')->unsigned();
        $table->foreign('proposal_id')->references('id')->on('proposals');
    });

    Schema::table('project_students', function ($table) {
        $table->integer('group_project_id')->unsigned();
        $table->foreign('group_project_id')->references('id')->on('group_projects');
        $table->integer('student_id')->unsigned();
        $table->foreign('student_id')->references('id')->on('students');
    });

    Schema::table('project_tools', function ($table) {
        $table->integer('group_project_id')->unsigned();
        $table->foreign('group_project_id')->references('id')->on('group_projects');
        $table->integer('tool_id')->unsigned();
        $table->foreign('tool_id')->references('id')->on('tools');
    });

    Schema::table('rooms_advisor', function ($table) {
        $table->integer('room_exam_id')->unsigned();
        $table->foreign('room_exam_id')->references('id')->on('rooms_exam');
        $table->integer('advisor_id')->unsigned();
        $table->foreign('advisor_id')->references('id')->on('advisors');
    });

    Schema::table('rooms_exam', function ($table) {
        $table->integer('group_project_id')->unsigned();
        $table->foreign('group_project_id')->references('id')->on('group_projects');
        $table->integer('room_id')->unsigned();
        $table->foreign('room_id')->references('id')->on('rooms');
    });

    Schema::table('score_tests', function ($table) {
        $table->integer('group_project_id')->unsigned();
        $table->foreign('group_project_id')->references('id')->on('group_projects');
    });
    Schema::table('project_advisors', function ($table) {
        $table->integer('advisor_position_id')->unsigned();
        $table->foreign('advisor_position_id')->references('id')->on('advisor_positions');
    });

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

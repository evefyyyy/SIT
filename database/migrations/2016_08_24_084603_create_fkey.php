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

        Schema::table('advisor_comment', function($table){
            $table->integer('project_pkid')->unsigned();
            $table->foreign('project_pkid')->references('id')->on('group_projects');
            $table->integer('template_main_id')->unsigned();
            $table->foreign('template_main_id')->references('id')->on('templates_main');
        });

        Schema::table('students', function ($table) {
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
            $table->integer('project_pkid')->unsigned();
            $table->foreign('project_pkid')->references('id')->on('group_projects');
        });

        Schema::table('group_projects', function ($table) {
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types');
            $table->integer('year_id')->unsigned();
            $table->foreign('year_id')->references('id')->on('years');
        });

        Schema::table('pictures', function ($table) {
            $table->integer('project_pkid')->unsigned();
            $table->foreign('project_pkid')->references('id')->on('group_projects');
            $table->integer('picture_type_id')->unsigned();
            $table->foreign('picture_type_id')->references('id')->on('picture_type');
        });

        Schema::table('project_advisors', function ($table) {
            $table->integer('project_pkid')->unsigned();
            $table->foreign('project_pkid')->references('id')->on('group_projects');
            $table->integer('advisor_id')->unsigned();
            $table->foreign('advisor_id')->references('id')->on('advisors');
        });

        Schema::table('proposals', function ($table) {
            $table->integer('project_pkid')->unsigned();
            $table->foreign('project_pkid')->references('id')->on('group_projects');
            $table->integer('proposal_type_id')->unsigned();
            $table->foreign('proposal_type_id')->references('id')->on('proposal_type');
        });
        Schema::table('proposal_sourcecode', function ($table) {
            $table->integer('project_pkid')->unsigned();
            $table->foreign('project_pkid')->references('id')->on('group_projects');
        });
        Schema::table('project_students', function ($table) {
            $table->integer('project_pkid')->unsigned();
            $table->foreign('project_pkid')->references('id')->on('group_projects');
            $table->integer('student_pkid')->unsigned();
            $table->foreign('student_pkid')->references('id')->on('students');
        });

        Schema::table('rooms_advisor', function ($table) {
            $table->integer('room_exam_id')->unsigned();
            $table->foreign('room_exam_id')->references('id')->on('rooms_exam');
            $table->integer('advisor_id')->unsigned();
            $table->foreign('advisor_id')->references('id')->on('advisors');
        });

        Schema::table('rooms_exam', function ($table) {
            $table->integer('project_pkid')->unsigned();
            $table->foreign('project_pkid')->references('id')->on('group_projects');
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->integer('sequence_exam_id')->unsigned();
            $table->foreign('sequence_exam_id')->references('id')->on('sequence_exam');
        });

        Schema::table('news', function ($table) {
            $table->integer('news_type_id')->unsigned();
            $table->foreign('news_type_id')->references('id')->on('news_type');
        });

        Schema::table('score_tests', function ($table) {
            $table->integer('project_pkid')->unsigned();
            $table->foreign('project_pkid')->references('id')->on('group_projects');
        });
        Schema::table('project_advisors', function ($table) {
            $table->integer('advisor_position_id')->unsigned();
            $table->foreign('advisor_position_id')->references('id')->on('advisor_positions');
        });
        Schema::table('project_detail', function($table){
            $table->integer('project_pkid')->unsigned();
            $table->foreign('project_pkid')->references('id')->on('group_projects');
        });
        Schema::table('dday_project', function($table){
            $table->integer('project_pkid')->unsigned();
            $table->foreign('project_pkid')->references('id')->on('group_projects');
            $table->integer('dday_id')->unsigned();
            $table->foreign('dday_id')->references('id')->on('dday');
        });
        Schema::table('user_advisor', function($table){
            $table->integer('advisor_id')->unsigned();
            $table->foreign('advisor_id')->references('id')->on('advisors');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('user_student', function($table){
            $table->integer('student_pkid')->unsigned();
            $table->foreign('student_pkid')->references('id')->on('students');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('user_staff', function($table){
            $table->integer('staff_id')->unsigned();
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('staff', function($table){
            $table->integer('user_type_id')->unsigned();
            $table->foreign('user_type_id')->references('id')->on('user_types');
        });
        Schema::table('main_templates_score', function($table){
            $table->integer('template_main_id')->unsigned();
            $table->foreign('template_main_id')->references('id')->on('templates_main');
            $table->integer('year_id')->unsigned();
            $table->foreign('year_id')->references('id')->on('years');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types');
        });
        Schema::table('sub_templates_score', function($table){
            $table->integer('main_template_score_id')->unsigned();
            $table->foreign('main_template_score_id')->references('id')->on('main_templates_score');
            $table->integer('template_sub_id')->unsigned();
            $table->foreign('template_sub_id')->references('id')->on('templates_sub');
        });
        Schema::table('grade_advisor', function($table){
            $table->integer('advisor_id')->unsigned();
            $table->foreign('advisor_id')->references('id')->on('advisors');
            $table->integer('main_template_id')->unsigned();
            $table->foreign('main_template_id')->references('id')->on('templates_main');
            $table->integer('project_pkid')->unsigned();
            $table->foreign('project_pkid')->references('id')->on('group_projects');
        });
        Schema::table('advisor_scoresheet', function($table){
            $table->integer('sub_template_id')->unsigned();
            $table->foreign('sub_template_id')->references('id')->on('templates_sub');
            $table->integer('advisor_id')->unsigned();
            $table->foreign('advisor_id')->references('id')->on('advisors');
            $table->integer('project_pkid')->unsigned();
            $table->foreign('project_pkid')->references('id')->on('group_projects');
        });
        Schema::table('templates_main', function($table){
            $table->integer('criteria_main_id')->unsigned();
            $table->foreign('criteria_main_id')->references('id')->on('criteria_mains');
            $table->integer('template_id')->unsigned();
            $table->foreign('template_id')->references('id')->on('templates');
        });
        Schema::table('templates_sub', function($table){
            $table->integer('template_main_id')->unsigned();
            $table->foreign('template_main_id')->references('id')->on('templates_main');
            $table->integer('criteria_sub_id')->unsigned();
            $table->foreign('criteria_sub_id')->references('id')->on('criteria_subs');
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

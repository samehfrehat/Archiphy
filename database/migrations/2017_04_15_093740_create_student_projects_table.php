<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';  
            $table->increments('id');  

            $table->String('title')->unique('title');
            $table->text('declaration')->nullable();
            $table->text('abstract')->nullable();
            $table->text('acknowledgements')->nullable();
            $table->text('background_motivation')->nullable();
            $table->text('aims_objectives')->nullable();
            $table->text('problem_statement')->nullable();
            $table->text('contributions')->nullable();
            $table->text('structure_report')->nullable();
            $table->text('literature_overview')->nullable();
            $table->text('existing_systems')->nullable();
            $table->text('summary')->nullable();
            $table->text('sa_introduction')->nullable();
            $table->text('a_existing_systems')->nullable();
            $table->text('fun_equirements')->nullable();            
            $table->text('nonf_equirements')->nullable();
            $table->string('image')->nullable();

            $table->integer('student_user_id')->unsigned();
            $table->foreign('student_user_id')->references('id')->on('student_users');            
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
        Schema::dropIfExists('student_projects');
    }
}

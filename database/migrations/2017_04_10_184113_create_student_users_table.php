<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('student_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique('email');
            $table->string('password');
            $table->string('gender');
            $table->string('phone_number')->nullable()->default("defult");
            $table->string('address')->nullable()->default("defult");
            $table->string('major');
            $table->string('image')->nullable();            
            $table->integer('group_id')->default(0);            
            $table->rememberToken();
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
        Schema::dropIfExists('student_users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->integer('nationality_id')->unsigned();
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->integer('blood_id')->unsigned();
            $table->foreign('blood_id')->references('id')->on('bloods')->onDelete('cascade');
            $table->integer('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('my_parents')->onDelete('cascade');
            $table->date('date_of_birth');
            $table->integer('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->integer('chapter_id')->unsigned();
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->integer('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->date('joining_at');
            $table->string('academic_year');
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
}

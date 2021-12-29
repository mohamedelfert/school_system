<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('file_name');
            $table->integer('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->integer('chapter_id')->unsigned();
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->integer('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->integer('teacher_id')->unsigned();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->dateTime('date');
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
        Schema::dropIfExists('libraries');
    }
}

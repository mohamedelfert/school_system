<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            $table->integer('from_grade_id')->unsigned();
            $table->foreign('from_grade_id')->references('id')->on('grades')->onDelete('cascade');

            $table->integer('from_chapter_id')->unsigned();
            $table->foreign('from_chapter_id')->references('id')->on('chapters')->onDelete('cascade');

            $table->integer('from_section_id')->unsigned();
            $table->foreign('from_section_id')->references('id')->on('sections')->onDelete('cascade');

            $table->integer('to_grade_id')->unsigned();
            $table->foreign('to_grade_id')->references('id')->on('grades')->onDelete('cascade');

            $table->integer('to_chapter_id')->unsigned();
            $table->foreign('to_chapter_id')->references('id')->on('chapters')->onDelete('cascade');

            $table->integer('to_section_id')->unsigned();
            $table->foreign('to_section_id')->references('id')->on('sections')->onDelete('cascade');

            $table->string('academic_year');
            $table->string('academic_year_new');

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
        Schema::dropIfExists('promotions');
    }
}

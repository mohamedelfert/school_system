<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_parents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            // Father Info
            $table->string('father_name')->unique();
            $table->string('father_address');
            $table->string('father_phone');
            $table->string('father_id');
            $table->string('father_passport');
            $table->string('father_job');
            $table->integer('father_nationality_id')->unsigned();
            $table->foreign('father_nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->integer('father_religion_id')->unsigned();
            $table->foreign('father_religion_id')->references('id')->on('religions')->onDelete('cascade');
            $table->integer('father_blood_id')->unsigned();
            $table->foreign('father_blood_id')->references('id')->on('bloods')->onDelete('cascade');
            // Mother Info
            $table->string('mother_name')->unique();
            $table->string('mother_address');
            $table->string('mother_phone');
            $table->string('mother_id');
            $table->string('mother_passport');
            $table->string('mother_job');
            $table->integer('mother_nationality_id')->unsigned();
            $table->foreign('mother_nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->integer('mother_religion_id')->unsigned();
            $table->foreign('mother_religion_id')->references('id')->on('religions')->onDelete('cascade');
            $table->integer('mother_blood_id')->unsigned();
            $table->foreign('mother_blood_id')->references('id')->on('bloods')->onDelete('cascade');
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
        Schema::dropIfExists('my_parents');
    }
}

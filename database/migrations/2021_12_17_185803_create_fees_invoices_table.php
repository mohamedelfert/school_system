<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('invoice_date');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->integer('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->integer('chapter_id')->unsigned();
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->integer('fee_id')->unsigned();
            $table->foreign('fee_id')->references('id')->on('study_fees')->onDelete('cascade');
            $table->decimal('amount',8,2);
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('fees_invoices');
    }
}

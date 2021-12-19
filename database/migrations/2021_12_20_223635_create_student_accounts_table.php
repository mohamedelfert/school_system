<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('type');
            $table->integer('fees_invoice_id')->nullable()->unsigned();
            $table->foreign('fees_invoice_id')->references('id')->on('fees_invoices')->onDelete('cascade');
            $table->integer('receipt_student_id')->nullable()->unsigned();
            $table->foreign('receipt_student_id')->references('id')->on('receipt_students')->onDelete('cascade');
            $table->integer('processing_fee_id')->nullable()->unsigned();
            $table->foreign('processing_fee_id')->references('id')->on('processing_fees')->onDelete('cascade');
            $table->integer('payment_student_id')->nullable()->unsigned();
            $table->foreign('payment_student_id')->references('id')->on('payments_students')->onDelete('cascade');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->decimal('debit',8,2)->nullable();
            $table->decimal('credit',8,2)->nullable();
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
        Schema::dropIfExists('student_accounts');
    }
}

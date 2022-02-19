<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_loan_details', function (Blueprint $table) {
            $table->bigIncrements('id_book_loan_details');
            $table->unsignedBigInteger('id_borrowing_book');
            $table->unsignedBigInteger('id_book');
            $table->integer('qty');

            $table->foreign('id_borrowing_book')->references('id_borrowing_book')->on('borrowing_book');
            $table->foreign('id_book')->references('id_book')->on('book');
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
        Schema::dropIfExists('book_loan_details');
    }
};

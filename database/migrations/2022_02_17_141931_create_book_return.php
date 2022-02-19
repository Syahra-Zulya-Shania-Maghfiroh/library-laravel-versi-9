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
        Schema::create('book_return', function (Blueprint $table) {
            $table->bigIncrements('id_book_return');
            $table->unsignedBigInteger('id_borrowing_book');
            $table->date('dateOfReturn');
            $table->integer('fine');
            
            $table->foreign('id_borrowing_book')->references('id_borrowing_book')->on('borrowing_book');
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
        Schema::dropIfExists('book_return');
    }
};

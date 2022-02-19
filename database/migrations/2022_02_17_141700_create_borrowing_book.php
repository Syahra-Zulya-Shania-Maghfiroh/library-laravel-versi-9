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
        Schema::create('borrowing_book', function (Blueprint $table) {
            $table->bigIncrements('id_borrowing_book');
            $table->unsignedBigInteger('id_student');
            $table->date('borrow_date');
            $table->date('return_date');
            $table->foreign('id_student')->references('id_student')->on('student');
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
        Schema::dropIfExists('borrowing_book');
    }
};

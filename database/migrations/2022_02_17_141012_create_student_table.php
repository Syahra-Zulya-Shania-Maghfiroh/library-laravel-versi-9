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
        Schema::create('student', function (Blueprint $table) {
            $table->bigIncrements('id_student');
            $table->unsignedBigInteger('id_grade');
            $table->string('student_name', 100);
            $table->date('born');
            $table->enum('gender', ['M','F']);
            $table->text('address');

            $table->foreign('id_grade')->references('id_grade')->on('grade');
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
        Schema::dropIfExists('student');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_marks', function (Blueprint $table) {
            $table->increments('id_student_mark');
            $table->integer('id_student')->unsigned();
            $table->enum('term', ['One', 'Two']);
            $table->float('maths', 10, 2);
            $table->float('science', 10, 2);
            $table->float('history', 10, 2);
            $table->timestamps();

            //foreign keys
            $table->foreign('id_student')->references('id_student')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_marks');
    }
}

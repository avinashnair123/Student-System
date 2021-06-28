<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id_student');
            $table->string('name', 50);
            $table->tinyInteger('age')->unsigned();
            $table->enum('gender', ['M', 'F']);
            $table->integer('id_teacher')->unsigned();

            //foreign keys
            $table->foreign('id_teacher')->references('id_teacher')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}

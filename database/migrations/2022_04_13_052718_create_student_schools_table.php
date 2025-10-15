<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_schools', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('teaching')->nullable();
            $table->string('academic_year')->nullable();
            $table->integer('school_id')->nullable();
            $table->string('school_year')->nullable();
            $table->string('classe')->nullable();
            $table->integer('period')->nullable();
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
        Schema::dropIfExists('student_schools');
    }
}

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
            $table->id();
            $table->string('name');
            $table->integer('sexe_id')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('nationality_country_id')->nullable();
            $table->integer('nationality_state_id')->nullable();
            $table->integer('nationality_city_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('address')->nullable();
            $table->string('number')->nullable();
            $table->string('district')->nullable();
            $table->string('zipcode')->nullable();


            $table->string('mother_name')->nullable();
            $table->string('mother_document')->nullable();
            $table->string('mother_office')->nullable();
            $table->string('mother_phone')->nullable();

            $table->string('father_name')->nullable();
            $table->string('father_document')->nullable();
            $table->string('father_office')->nullable();
            $table->string('father_phone')->nullable();


            $table->string('go_classes')->nullable();

            $table->string('has_allergy')->nullable();
            $table->string('has_medicine')->nullable();
            $table->string('has_health_plan')->nullable();
            
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            
            $table->mediumText('has_comments_health')->nullable();


            $table->boolean('status')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
}

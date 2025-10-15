<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researches', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->string('year')->nullable();
            $table->string('when_did_you_start_program')->nullable();
            $table->integer('how_did_you_program')->nullable();
            $table->integer('what_led_to_program')->nullable();
            $table->integer('have_you_ever_stopped_studying')->nullable();
            $table->string('in_what_year')->nullable();
            $table->integer('did_you_need_tutoring')->nullable();
            $table->integer('had_difficulty_learning')->nullable();
            $table->integer('what_is_the_family_situation')->nullable();
            $table->integer('with_currently_lives')->nullable();
            $table->integer('how_many_people_same_household')->nullable();
            $table->integer('when_you_child_stay')->nullable();
            $table->integer('what_living_conditions')->nullable();
            $table->integer('your_child_has_social_network')->nullable();
            $table->integer('what_is_accessing_the_internet')->nullable();
            $table->integer('what_family_means_of_transportation')->nullable();
            $table->integer('level_of_education')->nullable();
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
        Schema::dropIfExists('researches');
    }
}

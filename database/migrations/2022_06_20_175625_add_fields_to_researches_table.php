<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('researches', function (Blueprint $table) {
            $table->string('how_did_you_program_other')->after('how_did_you_program')->nullable();
            $table->string('what_led_to_program_other')->after('what_led_to_program')->nullable();
            $table->string('with_currently_lives_other')->after('with_currently_lives')->nullable();
            $table->string('when_you_child_stay_other')->after('when_you_child_stay')->nullable();
            $table->string('what_living_conditions_other')->after('what_living_conditions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('researches', function (Blueprint $table) {
            $table->dropColumn('how_did_you_program_other');
            $table->dropColumn('what_led_to_program_other');
            $table->dropColumn('with_currently_lives_other');
            $table->dropColumn('when_you_child_stay_other');
            $table->dropColumn('what_living_conditions_other');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('hat_home')->after('id')->nullable();
            $table->string('title_home')->after('id')->nullable();
            $table->string('hat_the_institute')->after('image')->nullable();
            $table->string('image_the_institute')->after('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn('hat_home');
            $table->dropColumn('title_home');
            $table->dropColumn('hat_the_institute');
            $table->dropColumn('image_the_institute');
        });
    }
}

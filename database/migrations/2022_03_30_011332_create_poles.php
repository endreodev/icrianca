<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('zipcode');
            $table->string('address');
            $table->string('number')->nullable();
            $table->string('district')->nullable();
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->boolean('is_visible')->default(0);
            $table->string('image')->nullable();
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
        Schema::dropIfExists('poles');
    }
}

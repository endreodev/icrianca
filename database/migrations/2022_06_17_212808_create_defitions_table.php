<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definitions', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->string('email_site')->nullable();
            $table->string('email_form_contact')->nullable();
            $table->string('email_form_helped_institute')->nullable();
            $table->string('bg_programs')->nullable();
            $table->string('bg_actions')->nullable();
            $table->string('bg_partners')->nullable();
            $table->string('bg_contacts')->nullable();
            $table->string('bg_reports')->nullable();
            $table->string('image_1_partner')->nullable();
            $table->string('image_2_partner')->nullable();
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
        Schema::dropIfExists('defitions');
    }
}

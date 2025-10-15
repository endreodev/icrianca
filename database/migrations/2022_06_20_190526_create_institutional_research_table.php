<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionalResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutional_research', function (Blueprint $table) {
            $table->id();
            $table->integer('research_id');
            $table->integer('interest_in_studying')->nullable();
            $table->integer('behavior')->nullable();
            $table->integer('responsibility')->nullable();
            $table->integer('respect')->nullable();
            $table->integer('self_esteem')->nullable();
            $table->integer('habits')->nullable();
            $table->integer('care')->nullable();
            $table->integer('filled_by')->nullable();
            $table->string('filled_by_other')->nullable();
            $table->mediumText('text')->nullable();
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
        Schema::dropIfExists('institutional_research');
    }
}

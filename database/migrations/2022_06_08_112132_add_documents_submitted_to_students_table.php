<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDocumentsSubmittedToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->boolean('certificate_medical')->after('birth_date')->default(false)->nullable();
            $table->boolean('certificate_birth')->after('birth_date')->default(false)->nullable();
            $table->boolean('certificate_of_schooling')->after('birth_date')->default(false)->nullable();
            $table->boolean('responsible_document')->after('birth_date')->default(false)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('certificate_medical');
            $table->dropColumn('certificate_birth');
            $table->dropColumn('certificate_of_schooling');
            $table->dropColumn('responsible_document');
        });
    }
}

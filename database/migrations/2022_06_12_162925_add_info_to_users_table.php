<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfoToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('admission_date')->nullable();
            $table->string('parentage')->nullable();
            $table->string('naturalness')->nullable();
            $table->enum('declared_color', ['indigenous', 'white', 'black', 'yellow', 'brown', 'not_informed'])->nullable();
            $table->string('marital_status')->nullable();
            $table->string('spouse_name')->nullable();
            $table->json('children')->nullable();
            $table->string('document')->nullable();

            $table->string('rg')->nullable();
            $table->string('rg_place_of_issue')->nullable();
            $table->date('rg_issue_date')->nullable();

            $table->string('work_card')->nullable();
            $table->string('work_card_series')->nullable();
            $table->string('work_card_issuing_state')->nullable();
            $table->date('work_card_issuing_date')->nullable();

            $table->string('voters_title')->nullable();
            $table->string('voters_title_zone')->nullable();
            $table->string('voters_title_section')->nullable();
            $table->string('voters_title_state')->nullable();
            $table->date('voters_title_issue_date')->nullable();

            $table->string('reservist_certificate')->nullable();
            $table->string('reservist_certificate_series')->nullable();
            $table->string('reservist_certificate_category')->nullable();
            $table->string('reservist_certificate_rm')->nullable();
            $table->date('reservist_certificate_issue_date')->nullable();

            $table->string('pis_pasep')->nullable();

            $table->string('cnh')->nullable();
            $table->string('cnh_category')->nullable();

            $table->string('class_body_registration')->nullable();
            $table->string('class_body_registration_issuing_body')->nullable();
            $table->string('class_body_registration_validaty')->nullable();

            $table->string('bank')->nullable();
            $table->string('bank_ag')->nullable();
            $table->string('bank_ac')->nullable();
            $table->string('bank_type')->nullable();

            $table->string('education_level')->nullable();
            $table->string('education_course')->nullable();
            $table->string('education_establishment')->nullable();

            $table->string('know_other_languages')->nullable();
            $table->longText('comments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('admission_date');
            $table->dropColumn('parentage');
            $table->dropColumn('naturalness');
            $table->dropColumn('declared_color');
            $table->dropColumn('marital_status');
            $table->dropColumn('spouse_name');
            $table->dropColumn('children');
            $table->dropColumn('document');

            $table->dropColumn('rg');
            $table->dropColumn('rg_place_of_issue');
            $table->dropColumn('rg_issue_date');

            $table->dropColumn('work_card');
            $table->dropColumn('work_card_series');
            $table->dropColumn('work_card_issuing_state');
            $table->dropColumn('work_card_issuing_date');

            $table->dropColumn('voters_title');
            $table->dropColumn('voters_title_zone');
            $table->dropColumn('voters_title_section');
            $table->dropColumn('voters_title_state');
            $table->dropColumn('voters_title_issue_date');

            $table->dropColumn('reservist_certificate');
            $table->dropColumn('reservist_certificate_series');
            $table->dropColumn('reservist_certificate_category');
            $table->dropColumn('reservist_certificate_rm');
            $table->dropColumn('reservist_certificate_issue_date');

            $table->dropColumn('pis_pasep');

            $table->dropColumn('cnh');
            $table->dropColumn('cnh_category');

            $table->dropColumn('class_body_registration');
            $table->dropColumn('class_body_registration_issuing_body');
            $table->dropColumn('class_body_registration_validaty');

            $table->dropColumn('bank');
            $table->dropColumn('bank_ag');
            $table->dropColumn('bank_ac');
            $table->dropColumn('bank_type');

            $table->dropColumn('education_level');
            $table->dropColumn('education_course');
            $table->dropColumn('education_establishment');

            $table->dropColumn('know_other_languages');
            $table->dropColumn('comments');
        });
    }
}

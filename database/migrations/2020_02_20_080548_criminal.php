<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Criminal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_cases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('crimi_case_no');
            $table->string('party_name');
            $table->string('p_father_name');
            $table->string('p_age');
            $table->string('p_address');
            $table->string('p_phone_no');
            $table->string('opponent_name');
            $table->string('o_father_name');
            $table->string('o_age');
            $table->string('o_address');
            $table->string('o_phone_no');
            $table->longText('case_history');
            $table->string('occurence_place');
            $table->string('decision');
            $table->string('o_previous_case_involved');
            $table->longText('o_previous_case');
            $table->string('lawyer_req');
            $table->string('FIR_copy');
            $table->string('evidence');
            $table->rememberToken();
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criminal_cases');
    }
}

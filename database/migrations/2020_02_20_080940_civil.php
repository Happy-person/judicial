<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Civil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('civil_cases', function (Blueprint $table) {
            $table->bigIncrements('civil_id');
            $table->string('civil_case_no');
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
            $table->string('decision');
            $table->string('documents');
            $table->string('lawyer_req');
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
        Schema::dropIfExists('civil_cases');
    }
}

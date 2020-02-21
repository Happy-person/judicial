<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AssignedCases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_cases', function (Blueprint $table) {
            $table->bigIncrements('ass_id');
            $table->string('case_no');
            $table->string('lawyer_id');
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
        Schema::dropIfExists('assigned_cases');
    }
}

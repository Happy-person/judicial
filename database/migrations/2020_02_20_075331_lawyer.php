<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lawyer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyer_profile', function (Blueprint $table) {
            $table->bigIncrements('lawyer_id');
            $table->integer('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->string('age');
            $table->string('gender');
            $table->string('qualification');
            $table->string('working_status');
            $table->string('firm_name');
            $table->string('experience');
            $table->string('enrollment_no')->unique();
            $table->string('photo');
            $table->string('certificates');
            $table->rememberToken();
            $table->timestamps();
            $table->softdeletes();
    //         $table->foreign('user_id')
    //   ->references('id')->on('users')
    //   ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lawyer_profile');
    }
}

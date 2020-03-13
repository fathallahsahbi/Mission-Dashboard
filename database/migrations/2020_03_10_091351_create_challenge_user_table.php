<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge_users', function (Blueprint $table) {
            $table->integer('user_user_id')->unsigned();
            $table->integer('challenge_challenge_id')->unsigned();
            $table->string('code_url')->default('');
            $table->timestamps();


            $table->foreign('challenge_challenge_id')->references('challenge_id')->on('challenges');
            $table->foreign('user_user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenge_user');
    }
}

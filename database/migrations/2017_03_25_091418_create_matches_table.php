<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('deal_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->timestamp('matched_on')->nullable();
            $table->timestamp('confirmed_on')->nullable();

            $table->string('url')->nullable();
            
            $table->foreign('deal_id')->references('id')->on('deals');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}

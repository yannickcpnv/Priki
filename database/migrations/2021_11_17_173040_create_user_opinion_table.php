<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOpinionTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_opinion', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->index('fk_users_has_opinions_user_idx');
            $table->integer('opinion_id')->index('fk_users_has_opinions_opinions1_idx');
            $table->string('comment', 5000);
            $table->integer('points')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_opinion');
    }
}

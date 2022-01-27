<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangelogsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('changelogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('user_id')->index('fk_change_users_idx');
            $table->integer('practice_id')->index('fk_change_practice_idx');
            $table->string('reason')->nullable(); // user's reason for change
            $table->string('previously'); // the value before the change
            $table->foreign(['user_id'], 'fk_change_user')
                  ->references(['id'])
                  ->on('users')
                  ->onUpdate('NO ACTION')
                  ->onDelete('NO ACTION');
            $table->foreign(['practice_id'], 'fk_change_practice')
                  ->references(['id'])
                  ->on('practices')
                  ->onUpdate('NO ACTION')
                  ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('changelogs');
    }
}

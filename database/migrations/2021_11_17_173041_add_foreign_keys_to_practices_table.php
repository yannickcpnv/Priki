<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToPracticesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('practices', function (Blueprint $table) {
            $table->foreign(['publication_state_id'], 'fk_practice_states1')->references(['id'])->on(
                'publication_states'
            )->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['domain_id'], 'fk_practice_themes')->references(['id'])->on('domains')->onUpdate(
                'NO ACTION'
            )->onDelete('NO ACTION');
            $table->foreign(['user_id'], 'fk_practice_submitter')->references(['id'])->on('users')->onUpdate(
                'NO ACTION'
            )->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('practices', function (Blueprint $table) {
            $table->dropForeign('fk_practice_states1');
            $table->dropForeign('fk_practice_themes');
            $table->dropForeign('fk_practice_submitter');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToOpinionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opinions', function (Blueprint $table) {
            $table->foreign(['practice_id'], 'fk_opinion_about')->references(['id'])->on('practices')->onUpdate(
                'NO ACTION'
            )->onDelete('NO ACTION');
            $table->foreign(['user_id'], 'fk_opinions_fusers1')->references(['id'])->on('users')->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opinions', function (Blueprint $table) {
            $table->dropForeign('fk_opinion_about');
            $table->dropForeign('fk_opinions_fusers1');
        });
    }
}

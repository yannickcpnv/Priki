<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToPublicationStateTransitionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publication_state_transitions', function (Blueprint $table) {
            $table->foreign(['from_id'], 'fk_publicationstatetransitions_publicationstates1')->references(['id'])->on(
                'publication_states'
            )->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['to_id'], 'fk_publicationstatetransitions_publicationstates2')->references(['id'])->on(
                'publication_states'
            )->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publication_state_transitions', function (Blueprint $table) {
            $table->dropForeign('fk_publicationstatetransitions_publicationstates1');
            $table->dropForeign('fk_publicationstatetransitions_publicationstates2');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpinionReferenceTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opinion_reference', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('opinion_id')->index('fk_references_has_opinions_opinions1_idx');
            $table->integer('reference_id')->index('fk_references_has_opinions_references1_idx');

            $table->unique(['reference_id', 'opinion_id'], 'UniqueReference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opinion_reference');
    }
}

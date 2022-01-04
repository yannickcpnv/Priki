<?php

use Illuminate\Database\Migrations\Migration;

class AddMinMaxCheckUserOpinionPoints extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $min = config('business.feedback.minimum points per user');
        $max = config('business.feedback.maximum points per user');
        DB::statement("ALTER TABLE user_opinion ADD CONSTRAINT chk_points CHECK (points BETWEEN $min AND $max)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE user_opinion DROP CONSTRAINT chk_points');
    }
}

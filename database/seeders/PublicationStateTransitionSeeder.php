<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PublicationStateTransition;

class PublicationStateTransitionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PublicationStateTransition::insert(
            [
                ['from_id' => 1, 'to_id' => 2],
                ['from_id' => 2, 'to_id' => 1],
                ['from_id' => 2, 'to_id' => 3],
                ['from_id' => 3, 'to_id' => 4],
                ['from_id' => 4, 'to_id' => 5],
                ['from_id' => 2, 'to_id' => 5],
            ]
        );
    }
}

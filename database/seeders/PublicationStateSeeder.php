<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicationStateSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publicationStates = [
            [
                'name' => 'Draft',
                'slug' => 'draft',
            ],
            [
                'name' => 'Published',
                'slug' => 'pub',
            ],
            [
                'name' => 'Archived',
                'slug' => 'arch',
            ],
        ];

        foreach ($publicationStates as $publicationState) {
            DB::table('publication_states')->insert($publicationState);
        }
    }
}

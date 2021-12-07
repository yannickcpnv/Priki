<?php

namespace Database\Seeders;

use App\Models\Domain;
use Illuminate\Database\Seeder;
use App\Models\PublicationState;

class PublicationStateSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PublicationState::insert(
            [
                ['name' => 'Brouillon', 'slug' => Domain::DRAFTED],
                ['name' => 'Proposé', 'slug' => DOMAIN::PROPOSED],
                ['name' => 'Publié', 'slug' => DOMAIN::PUBLISHED],
                ['name' => 'Clos', 'slug' => DOMAIN::CLOSED],
                ['name' => 'Archivé', 'slug' => DOMAIN::ARCHIVED],
            ]
        );
    }
}

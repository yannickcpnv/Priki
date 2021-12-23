<?php

namespace Database\Seeders;

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
                ['name' => 'Brouillon', 'slug' => config('business.domain.drafted')],
                ['name' => 'Proposé', 'slug' => config('business.domain.proposed')],
                ['name' => 'Publié', 'slug' => config('business.domain.published')],
                ['name' => 'Clos', 'slug' => config('business.domain.closed')],
                ['name' => 'Archivé', 'slug' => config('business.domain.archived')],
            ]
        );
    }
}

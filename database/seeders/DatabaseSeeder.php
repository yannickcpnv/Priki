<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                TruncateAllTables::class,
                DomainSeeder::class,
                PublicationStateSeeder::class,
                PublicationStateTransitionSeeder::class,
                RoleSeeder::class,
                UserSeeder::class,
                PracticeSeeder::class,
                OpinionSeeder::class,
                ReferenceSeeder::class,
                OpinionReferenceSeeder::class,
            ]
        );
    }
}

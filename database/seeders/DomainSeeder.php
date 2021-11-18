<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $domains = [
            [
                'name' => 'Domain 1',
                'slug' => 'domain-1',
            ],
            [
                'name' => 'Domain 2',
                'slug' => 'domain-2',
            ],
            [
                'name' => 'Domain 3',
                'slug' => 'domain-3',
            ],
        ];

        foreach ($domains as $domain) {
            DB::table('domains')->insert($domain);
        }
    }
}

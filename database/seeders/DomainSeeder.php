<?php

namespace Database\Seeders;

use App\Models\Domain;
use Illuminate\Database\Seeder;

class DomainSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Domain::insert(
            [
                ['name' => 'Web', 'slug' => 'WEB'],
                ['name' => 'Scientifique', 'slug' => 'SCI'],
                ['name' => 'Business', 'slug' => 'BUS'],
                ['name' => 'Medical', 'slug' => 'MED'],
                ['name' => 'Industriel and contrôle de processus', 'slug' => 'IND'],
                ['name' => 'Embarqué', 'slug' => 'EMB'],
                ['name' => 'Big Data', 'slug' => 'BGD'],
                ['name' => 'Militaire', 'slug' => 'MIL'],
                ['name' => 'Système d\'exploitation', 'slug' => 'OS'],
                ['name' => 'Outils', 'slug' => 'TLS'],
            ]
        );
    }
}

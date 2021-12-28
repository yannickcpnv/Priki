<?php

namespace Database\Seeders;

use App\Models\Opinion;
use App\Models\Reference;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpinionReferenceSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max = 30;
        for ($i = 0; $i < $max; $i++) {
            try {
                DB::table('opinion_reference')->insert(
                    [
                        'opinion_id' => Opinion::all()->random()->id,
                        'reference_id' => Reference::all()->random()->id,
                    ]
                );
            } catch (QueryException) {
                logger('Increase to 1.');
                $max++;
            }
        }
    }
}

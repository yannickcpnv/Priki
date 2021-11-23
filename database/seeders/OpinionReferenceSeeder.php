<?php

namespace Database\Seeders;

use App\Models\Opinion;
use App\Models\Reference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class OpinionReferenceSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 30; $i++) {
            try {
                DB::table('opinion_reference')->insert(
                    [
                        'opinion_id' => Opinion::all()->random()->id,
                        'reference_id' => Reference::all()->random()->id,
                    ]
                );
            } catch (QueryException $e) {
                $i--;
                // nothing, just ignore the duplicate
            }
        }
    }
}

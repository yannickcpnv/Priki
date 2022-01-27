<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Domain;
use App\Models\PublicationState;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Database\Eloquent\Factories\Factory;

class PracticeFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape([
        'title'                => "string",
        'description'          => "string",
        'domain_id'            => "int",
        'publication_state_id' => "int",
        'user_id'              => "int",
    ])] public function definition(): array
    {
        $charsNb = mt_rand(3, 40);
        $title = $charsNb < 5 ? 'abc' : $this->faker->text($charsNb);

        return [
            'title'                => $title,
            'description'          => $this->faker->realText(5000),
            'domain_id'            => Domain::all()->random()->id,
            'publication_state_id' => PublicationState::all()->random()->id,
            'user_id'              => User::all()->random()->id,
        ];
    }
}

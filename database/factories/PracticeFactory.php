<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Domain;
use App\Models\PublicationState;
use Illuminate\Database\Eloquent\Factories\Factory;

class PracticeFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description'          => $this->faker->realText(5000),
            'domain_id'            => Domain::all()->random()->id,
            'publication_state_id' => PublicationState::all()->random()->id,
            'user_id'              => User::all()->random()->id,
        ];
    }
}

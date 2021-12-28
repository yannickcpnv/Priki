<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

class UserFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape([
        'role_id'           => "int",
        'name'              => "string",
        'fullname'          => "string",
        'email'             => "string",
        'email_verified_at' => Carbon::class,
        'password'          => "mixed",
        'remember_token'    => "string",
    ])] public function definition(): array
    {
        $firstName = $this->faker->unique->firstName();
        return [
            'role_id'           => Role::all()->random()->id,
            'name'              => $firstName,
            'fullname'          => $firstName . ' ' . $this->faker->lastName(),
            'email'             => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10),
        ];
    }
}

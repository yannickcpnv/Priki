<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
                         'role_id'           => Role::where('slug', 'admin')->first()->id,
                         'name'              => 'Armand',
                         'fullname'          => 'Marechal',
                         'email'             => 'armand.marechal@cpnv.ch',
                         'email_verified_at' => now(),
                         'password'          => Hash::make('root'),
                         'remember_token'    => Str::random(10),
                     ]);

        User::factory(50)->create();
    }
}

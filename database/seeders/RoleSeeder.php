<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'User',
                'slug' => 'user',
            ],
            [
                'name' => 'Moderator',
                'slug' => 'mode',
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
            ],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert($role);
        }
    }
}

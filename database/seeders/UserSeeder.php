<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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
        // Real users
        $default = Role::where('slug', 'MBR')->firstOrFail();
        $moderator = Role::where('slug', 'MOD')->firstOrFail();
        foreach (
            [
                ['lname' => 'BAUDRAZ', 'fname' => 'Yannick', 'role' => $default],
                ['lname' => 'BOUILLANT', 'fname' => 'Anthony', 'role' => $default],
                ['lname' => 'COSTA-DOS-SANTOS', 'fname' => 'Mauro-Alexandre', 'role' => $default],
                ['lname' => 'DELGADO', 'fname' => 'Noah', 'role' => $default],
                ['lname' => 'DUBUIS', 'fname' => 'Helene', 'role' => $default],
                ['lname' => 'GAUTIER', 'fname' => 'Theo', 'role' => $default],
                ['lname' => 'GOLDENSCHUE', 'fname' => 'Cyril', 'role' => $default],
                ['lname' => 'MARECHAL', 'fname' => 'Armand', 'role' => $default],
                ['lname' => 'MOITA-MARTINS', 'fname' => 'Filipe-Alexandre', 'role' => $default],
                ['lname' => 'OHAN', 'fname' => 'Melodie', 'role' => $default],
                ['lname' => 'RABOT', 'fname' => 'Mathieu', 'role' => $default],
                ['lname' => 'ROCHA-FERREIRA', 'fname' => 'Mario-Andre', 'role' => $default],
                ['lname' => 'SAMOUTPHONH', 'fname' => 'Souphakone', 'role' => $default],
                ['lname' => 'TESFAZGHI', 'fname' => 'Robiel', 'role' => $default],
                ['lname' => 'CARREL', 'fname' => 'Xavier', 'role' => $moderator],
                ['lname' => 'GLASSEY', 'fname' => 'Nicolas', 'role' => $moderator],
                ['lname' => 'HURNI', 'fname' => 'Pascal', 'role' => $moderator],
            ]
            as $user
        ) {
            User::create([
                             'role_id'  => $user['role']->id,
                             'name'     => ucfirst(strtolower($user['fname'])) . ucfirst(strtolower($user['lname'])),
                             'fullname' => ucfirst(strtolower($user['fname'])) . " " . $user['lname'],
                             'email'    => ucfirst(strtolower($user['fname'])) . "." . ucfirst(
                                     strtolower($user['lname'])
                                 ) . "@cpnv.ch",
                             'password' => Hash::make(strtolower($user['lname'])),
                         ]);
        }

        // and a few fake ones
        User::factory(10)->create();
    }
}

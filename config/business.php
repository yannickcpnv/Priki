<?php

return [

    'practice' => [
        /*
        |--------------------------------------------------------------------------
        | Application Default updated days
        |--------------------------------------------------------------------------
        |
        | The number of previous days, to use to display the latest
        | recent practices.
        |
        */
        'last_updated_days' => 5,
    ],

    'user' => [
        /*
        |--------------------------------------------------------------------------
        | Application Default role of user
        |--------------------------------------------------------------------------
        |
        | The default role a user will have at the creation.
        |
        */
        'default_role' => config('business.role.Membre'),
    ],

    'domain' => [
        'drafted'   => 'DRA',
        'proposed'  => 'PRO',
        'published' => 'PUB',
        'closed'    => 'CLO',
        'archived'  => 'ARC',
    ],

    'role' => [
        'member'    => 'MBR',
        'moderator' => 'MOD',
    ],
];

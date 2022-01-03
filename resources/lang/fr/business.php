<?php

return [
    'opinion'   => [
        'added'   => 'L\'opinion a été ajouté.',
        'deleted' => 'L\'opinion a été supprimée.',
        'error'   => [
            'unique user in practice' => 'Vous avez déjà donné votre opinion pour cette practice.',
            'not deleted'             => 'L\'opinion n\'a pas pu être supprimé.',
        ],
    ],
    'reference' => [
        'added' => 'La référence a été ajoutée.',
        'error' => [
            'unique url' => 'L\'url existe déjà pour une autre référence.',
        ],
    ],
    'comment'   => [
        'added' => 'Le commentaire a été ajouté.',
    ],
    'error'     => [
        'database'      => 'Une erreur s\'est produite avec la base de données.',
        'data too long' => 'Les données dépassent le maximum autorisé.',
    ],
];

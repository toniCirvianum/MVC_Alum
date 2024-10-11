<?php

$mps = [
    [
        "id" => 0,
        'num_mp' => 1,
        'nom_mp' => 'Modul 1'
    ],
    [
        "id" => 1,
        'num_mp' => 2,
        'nom_mp' => 'Modul 2'
    ],
    [
        "id" => 2,
        'num_mp' => 3,
        'nom_mp' => 'Modul 3'
    ],
    [
        "id" => 3,
        'num_mp' => 4,
        'nom_mp' => 'Modul 4'
    ]
];

$users = [
    [
        'id'=>0,
        'username'=>'admin',
        'password'=>'123',
        'admin'=>true
    ],
    [
        'id'=>0,
        'username'=>'raquel',
        'password'=>'123',
        'admin'=>false
    ]
];

if (!isset($_SESSION['mps'])) $_SESSION['mps']=$mps;
if (!isset($_SESSION['users']))$_SESSION['users']=$users;

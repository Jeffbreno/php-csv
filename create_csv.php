<?php

require __DIR__ . '/vendor/autoload.php';

use App\Files\CSV;

$data = [
    [
        'ID',
        'NOME',
        'CPF',
        'DATA_CADASTRO'
    ],
    [
        1,
        'NOME 01',
        '55664488425',
        '23/08/2005 12:48:35'
    ],
    [
        2,
        'NOME 02',
        '78955466222',
        '22/06/2023 04:00:00'
    ],
    [
        3,
        'NOME 03',
        '06262132406',
        '02/05/2023 12:01:55'
    ],
    [
        4,
        'NOME 04',
        '11455688778',
        '11/08/2003 00:00:00'
    ],
];

$success = CSV::createFile(__DIR__ . '/files/file_create.csv', $data, ';');

// var_dump($success);

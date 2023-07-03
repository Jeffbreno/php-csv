<?php

require __DIR__ . '/vendor/autoload.php';

use App\Files\CSV;

$data = CSV::readFile(__DIR__ . '/files/file.csv', true, ';');
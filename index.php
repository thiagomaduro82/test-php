<?php

require __DIR__ . '/vendor/autoload.php';

use App\Database\Database;

$database = new Database;

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/home.php';
require __DIR__ . '/includes/footer.php';

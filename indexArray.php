<?php

require __DIR__ . '/vendor/autoload.php';

use App\Classes\ArrayRandon;

$arrayRandom = new ArrayRandon;

$arrays = $arrayRandom->mainArray();

require __DIR__ . '/includes/header.php';

require __DIR__ . '/includes/question2.php';

require __DIR__ . '/includes/footer.php';

<?php

require __DIR__ . '/vendor/autoload.php';

use App\Classes\ABTesting;

$abTesting = new ABTesting();

if ($_POST['promotion']) {
    if ($_SESSION['control']) {
        unset($_SESSION['control']);
    }
    $abTesting->generateControl($abTesting->getData($_POST['promotion']));
}

if ($_GET['plus']) {
    if ($_SESSION['control']) {
        $abTesting->main();
    }
}

if ($_GET['clear']) {
    if ($_SESSION['control']) {
        unset($_SESSION['control']);
    }
}

require __DIR__ . '/includes/header.php';

require __DIR__ . '/includes/question4.php';

require __DIR__ . '/includes/footer.php';

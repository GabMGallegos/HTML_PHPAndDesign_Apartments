<?php

require_once __DIR__ . '/../config/database.php';

use RedBeanPHP\R;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $rooms = trim($_POST['rooms'] ?? '');
    $color = trim($_POST['color'] ?? '');

    if ($name === '' || $rooms === '' || !is_numeric($rooms) || (int) $rooms <= 0) {
        header('Location: ../index.php?status=error');
        exit;
    }

    $aparment = R::dispense('aparment');
    $aparment->name = $name;
    $aparment->rooms = (int) $rooms;
    $aparment->color = $color;

    R::store($aparment);

    header('Location: ../index.php?status=success');
    exit;
}

header('Location: ../index.php');
exit;
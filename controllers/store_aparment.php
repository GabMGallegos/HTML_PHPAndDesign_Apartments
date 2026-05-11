<?php

require_once __DIR__ . '/../config/database.php';

use RedBeanPHP\R;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $age = trim($_POST['age'] ?? '');

    if ($name === '' || $age === '' || !is_numeric($age) || (int) $age <= 0) {
        header('Location: ../index.php?status=error');
        exit;
    }

    $aparment = R::dispense('aparment');
    $aparment->name = $name;
    $aparment->age = (int) $age;

    R::store($aparment);

    header('Location: ../index.php?status=success');
    exit;
}

header('Location: ../index.php');
exit;
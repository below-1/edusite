<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();
    $mysqli = new mysqli($DB_HOST, $DB_USER,$DB_PASSWORD, $DB_NAME);

    $qs = 'SELECT * FROM kecamatan order by nama';
    $allKecamatanQuery = $mysqli->query($qs);
    $result = $allKecamatanQuery->fetch_all(MYSQLI_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($result);
    die();

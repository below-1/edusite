<?php
    use Doctrine\ORM\Query\ResultSetMapping;

    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();

    $data = json_decode(file_get_contents('php://input'), true);
    // Which kecamatan selected by user.
    $selectedKec = $data['kecamatan'];
    $selKec = implode(',', array_map(function ($it) { return "'$it'"; }, $selectedKec));

    $mysqli = new mysqli($DB_HOST, $DB_USER,$DB_PASSWORD, $DB_NAME);
    $qStr = "SELECT s.id, s.nama, s.latitude, s.longitude FROM sekolah s WHERE s.kecamatan in ($selKec)";
    $qResult = $mysqli->query($qStr);
    $result = $qResult->fetch_all(MYSQLI_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($result);
    die();
<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();

    try {
        $sekolahId = $_SESSION['sekolahId'];
        $paudLakiLaki = $_POST['paudLakiLaki'];
        $paudPerempuan = $_POST['paudPerempuan'];
        $paud23 = $_POST['paud23'];
        $paud34 = $_POST['paud34'];

    } catch (Exception $ex) {
        $data = array('message' => 'Error parsing form');
        echo $twig->render('login.html', $data);
        die();
    }

    $sekolah = $entity_manager->find('Edusite\Model\Sekolah', $sekolahId);
    $sekolah->setPaudLakiLaki($paudLakiLaki);
    $sekolah->setPaudPerempuan($paudPerempuan);
    $sekolah->setPaud23($paud23);
    $sekolah->setPaud34($paud34);

    $entity_manager->persist($sekolah);
    $entity_manager->flush();

    header("Location: /app/user/index.php?menu=paudjumlahsiswa");
    die();
?>
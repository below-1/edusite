<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();

    try {
        $sekolahId = $_SESSION['sekolahId'];
        $alamat = $_POST['alamat'];
        $kelurahanDesa = $_POST['kelurahanDesa'];
        $kabupaten = $_POST['kabupaten'];
        $provinsi = 'NTT';
        $kodePos = $_POST['kodePos'];
        $telepon = $_POST['telepon'];
        $email = $_POST['email'];

    } catch (Exception $ex) {
        $data = array('message' => 'Error parsing form');
        echo $twig->render('login.html', $data);
        die();
    }

    $sekolah = $entity_manager->find('Edusite\Model\Sekolah', $sekolahId);
    $sekolah->setAlamat($alamat);
    $sekolah->setKelurahanDesa($kelurahanDesa);
    $sekolah->setKabupaten($kabupaten);
    $sekolah->setProvinsi($provinsi);
    $sekolah->setKodePos($kodePos);
    $sekolah->setTelepon($telepon);
    $sekolah->setEmail($email);

    $entity_manager->persist($sekolah);
    $entity_manager->flush();

    header("Location: /app/user/index.php?menu=alamat");
    die();
?>
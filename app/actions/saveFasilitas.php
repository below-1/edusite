<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();

    try {
        $sekolahId = $_SESSION['sekolahId'];
        $nama = $_POST['nama'];
        $jumlah = $_POST['jumlah'];
        $kondisi = $_POST['kondisi'];

    } catch (Exception $ex) {
        $data = array('message' => 'Error parsing form');
        echo $twig->render('login.html', $data);
        die();
    }

    $f = new Edusite\Model\Fasilitas();
    $sekolah = $entity_manager->find('Edusite\Model\Sekolah', $sekolahId);

    $f->setNama($nama);
    $f->setJumlah($jumlah);
    $f->setKondisi($kondisi);
    $f->setSekolah($sekolah);

    $entity_manager->persist($f);
    $entity_manager->flush();
    
    header("Location: /app/user/index.php?menu=fasilitas");
    die();
?>
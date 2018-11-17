<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();

    try {
        $sekolahId = $_SESSION['sekolahId'];
        $nama = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $kondisi = $_POST['kondisi'];
        $tahun = $_POST['tahun'];

    } catch (Exception $ex) {
        $data = array('message' => 'Error parsing form');
        echo $twig->render('login.html', $data);
        die();
    }

    $f = new Edusite\Model\Bangunan();
    $sekolah = $entity_manager->find('Edusite\Model\Sekolah', $sekolahId);

    $f->setNama($nama);
    $f->setTahun($tahun);
    $f->setKategori($kategori);
    $f->setKondisi($kondisi);
    $f->setSekolah($sekolah);

    $entity_manager->persist($f);
    $entity_manager->flush();
    
    header("Location: /app/user/index.php?menu=bangunan");
    die();
?>
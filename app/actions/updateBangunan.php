<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();

    try {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $tahun = $_POST['tahun'];
        $kondisi = $_POST['kondisi'];

    } catch (Exception $ex) {
        $data = array('message' => 'Error parsing form');
        echo $twig->render('login.html', $data);
        die();
    }

    $f = $entity_manager->find('Edusite\Model\Bangunan', $id);

    $f->setNama($nama);
    $f->setKategori($kategori);
    $f->setTahun($tahun);
    $f->setKondisi($kondisi);

    $entity_manager->persist($f);
    $entity_manager->flush();
    
    header("Location: /app/user/index.php?menu=bangunan");
    die();
?>
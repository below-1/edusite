<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();

    try {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jumlah = $_POST['jumlah'];
        $kondisi = $_POST['kondisi'];

    } catch (Exception $ex) {
        $data = array('message' => 'Error parsing form');
        echo $twig->render('login.html', $data);
        die();
    }

    $f = $entity_manager->find('Edusite\Model\Fasilitas', $id);

    $f->setNama($nama);
    $f->setJumlah($jumlah);
    $f->setKondisi($kondisi);

    $entity_manager->persist($f);
    $entity_manager->flush();
    
    header("Location: /app/user/index.php?menu=fasilitas");
    die();
?>
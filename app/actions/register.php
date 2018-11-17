<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    $username = $_POST['username'];
    $jenisSekolah = $_POST['jenisSekolah'];
    $namaSekolah = $_POST['namaSekolah'];
    $password = $_POST['password'];

    $sekolah = new \Edusite\Model\Sekolah();
    $sekolah->setUsername($username);
    $sekolah->setPassword($password);
    $sekolah->setNama($namaSekolah);
    $sekolah->setKategori($jenisSekolah);

    $entity_manager->persist($sekolah);
    $entity_manager->flush();

    $data = array(
        'message' => 'Sukses mendaftar. Silahkan login dengan username dan password anda'
    );

    echo $twig->render('login.html', $data);
?>
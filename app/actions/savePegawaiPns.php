<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();

    try {
        $sekolahId = $_SESSION['sekolahId'];
        $nama = $_POST['nama'];
        $nip = $_POST['nip'];
        $golongan = $_POST['golongan'];
        $jabatan = $_POST['jabatan'];
        $tempatLahir = $_POST['tempatLahir'];
        $tanggalLahir = $_POST['tanggalLahir'];
        $status = $_POST['status'];
        $pendTerakhir = $_POST['pendTerakhir'];

    } catch (Exception $ex) {
        $data = array('message' => 'Error parsing form');
        echo $twig->render('login.html', $data);
        die();
    }

    $p = new Edusite\Model\Pegawai();
    $sekolah = $entity_manager->find('Edusite\Model\Sekolah', $sekolahId);

    $p->setSekolah($sekolah);
    $p->setNama($nama);
    $p->setNip($nip);
    $p->setKategori(1);
    $p->setGolongan($golongan);
    $p->setJabatan($jabatan);
    $p->setTempatLahir($tempatLahir);

    $tanggalLahir = date_create_from_format('Y-m-d', $tanggalLahir);
    $p->setTanggalLahir($tanggalLahir);

    $p->setStatus($status);
    $p->setPendTerakhir($pendTerakhir);

    $entity_manager->persist($p);
    $entity_manager->flush();
    
    header("Location: /app/user/index.php?menu=pegawaipns");
    die();
?>
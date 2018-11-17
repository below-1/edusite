<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();

    try {
        $sekolahId = $_SESSION['sekolahId'];
        $nama = $_POST['nama'];
        $npsn = $_POST['npsn'];
        $nss = $_POST['nss'];
        $tahunBerdiri = $_POST['tahunBerdiri'];
        $tahunOperasi = $_POST['tahunBeroperasi'];
        $statusAkreditasi = $_POST['statusAkreditasi'];
        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];
        $imb = $_POST['imb'];
        $visi = $_POST['visi'];
        $misi = $_POST['misi'];

    } catch (Exception $ex) {
        $data = array('message' => 'Error parsing form');
        echo $twig->render('login.html', $data);
        die();
    }

    $sekolah = $entity_manager->find('Edusite\Model\Sekolah', $sekolahId);
    $sekolah->setNama($nama);
    $sekolah->setNpsn($npsn);
    $sekolah->setNss($nss);
    $sekolah->setTahunBerdiri($tahunBerdiri);
    $sekolah->setTahunBeroperasi($tahunOperasi);
    $sekolah->setStatusAkreditasi($statusAkreditasi);
    $sekolah->setLongitude($longitude);
    $sekolah->setLatitude($latitude);
    $sekolah->setImb($imb);
    $sekolah->setVisi($visi);
    $sekolah->setMisi($misi);

    $entity_manager->persist($sekolah);
    $entity_manager->flush();

    header("Location: /app/user/index.php");
    die();
?>
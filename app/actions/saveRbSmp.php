<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();

    try {
        $sekolahId = $_SESSION['sekolahId'];
        $tahun = $_POST['tahun'];
        $js1 = $_POST['rb1'];
        $js2 = $_POST['rb2'];
        $js3 = $_POST['rb3'];

    } catch (Exception $ex) {
        $data = array('message' => 'Error parsing form');
        echo $twig->render('login.html', $data);
        die();
    }

    $query = $entity_manager->createQuery("SELECT ds FROM Edusite\Model\Sekolah s JOIN Edusite\Model\DeskripsiTahun ds WHERE ds.sekolah = $sekolahId AND ds.tahun = $tahun ORDER BY ds.tahun ASC");
    $selectResult = $query->getArrayResult();

    $ds = new \Edusite\Model\DeskripsiTahun();

    // There is no data for given year
    if (count($selectResult) == 0) {
        $ds->setTahun($tahun);
        $sekolah = $entity_manager->find('Edusite\Model\Sekolah', $sekolahId);
        $ds->setSekolah($sekolah);
    } else {
        $ds = $entity_manager->find('Edusite\Model\DeskripsiTahun', $selectResult[0]['id']);
    }

    $ds->setRb1($js1);
    $ds->setRb2($js2);
    $ds->setRb3($js3);
    $entity_manager->persist($ds);
    $entity_manager->flush();
    
    header("Location: /app/user/index.php?menu=siswaperrb");
    die();
?>
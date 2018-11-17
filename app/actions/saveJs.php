<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();

    try {
        $sekolahId = $_SESSION['sekolahId'];
        $tahun = $_POST['tahun'];
        $js1 = $_POST['js1'];
        $js2 = $_POST['js2'];
        $js3 = $_POST['js3'];
        $js4 = $_POST['js4'];
        $js5 = $_POST['js5'];
        $js6 = $_POST['js6'];

    } catch (Exception $ex) {
        $data = array('message' => 'Error parsing form');
        echo $twig->render('login.html', $data);
        die();
    }

    $qb = $entity_manager->createQueryBuilder();
    $selectResult = $qb->select('ds', 's')
                ->from('Edusite\\Model\\DeskripsiTahun', 'ds')
                ->join('Edusite\\Model\\Sekolah', 's', 'ON')
                ->where('ds.tahun = ' . $tahun)
                ->getQuery()->getArrayResult();

    $ds = new \Edusite\Model\DeskripsiTahun();

    // There is no data for given year
    if (count($selectResult) == 0) {
        $ds->setTahun($tahun);
        $sekolah = $entity_manager->find('Edusite\Model\Sekolah', $sekolahId);
        $ds->setSekolah($sekolah);
    } else {
        $ds = $entity_manager->find('Edusite\Model\DeskripsiTahun', $selectResult[0]['id']);
    }

    $ds->setJs1($js1);
    $ds->setJs2($js2);
    $ds->setJs3($js3);
    $ds->setJs4($js4);
    $ds->setJs5($js5);
    $ds->setJs6($js6);
    $entity_manager->persist($ds);
    $entity_manager->flush();
    
    header("Location: /app/user/index.php?menu=siswaperkelas");
    die();
?>
<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();

    try {
        $sekolahId = $_SESSION['sekolahId'];
        $tahun = $_POST['tahun'];
        $js1 = $_POST['rb1'];
        $js2 = $_POST['rb2'];
        $js3 = $_POST['rb3'];
        $js4 = $_POST['rb4'];
        $js5 = $_POST['rb5'];
        $js6 = $_POST['rb6'];

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

    $ds->setRb1($js1);
    $ds->setRb2($js2);
    $ds->setRb3($js3);
    $ds->setRb4($js4);
    $ds->setRb5($js5);
    $ds->setRb6($js6);
    $entity_manager->persist($ds);
    $entity_manager->flush();
    
    header("Location: /app/user/index.php?menu=siswaperrb");
    die();
?>
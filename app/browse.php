<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();
    $repo = $entity_manager->getRepository('Edusite\Model\Sekolah');
    $items = $repo->findAll();
    $data = array('items' => $items);

    if (isset($_SESSION['sekolahId'])) {
        $data['loggedIn'] = true;
    }
    echo $twig->render('browse.html', $data);
?>
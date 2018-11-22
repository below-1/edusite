<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();
    $repo = $entity_manager->getRepository('Edusite\Model\Sekolah');
    $items = $repo->findAll();
	$items = array_map(function ($it) { return [ 
		'longitude' => $it->getLongitude(), 
		'latitude' => $it->getLatitude(),
		'nama' => $it->getNama(),
		'id' => $it->getId()
	]; }, $items);
    $data = array('items' => $items);

    if (isset($_SESSION['sekolahId'])) {
        $data['loggedIn'] = true;
    }
    echo $twig->render('maps.html', $data);
?>
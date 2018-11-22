<?php
    use Doctrine\ORM\Query\ResultSetMapping;

    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();
    $repo = $entity_manager->getRepository('Edusite\Model\Sekolah');
    $items = $repo->findAll();
    $data = array('items' => $items);
    
	$mapItems = array_map(function ($it) { return [ 
		'longitude' => $it->getLongitude(), 
		'latitude' => $it->getLatitude(),
		'nama' => $it->getNama(),
		'id' => $it->getId()
    ]; }, $items);
    
    $data['mapItems'] = $mapItems;

    // Count by kategori
    $mysqli = new mysqli($DB_HOST, $DB_USER,$DB_PASSWORD, $DB_NAME);
    $qResult = $mysqli->query('SELECT s.kategori, COUNT(s.kategori) as total FROM sekolah s GROUP BY s.kategori');
    $kategoriCount = $qResult->fetch_all(MYSQLI_ASSOC);
    // var_dump($kategoriCount);
    // die();
    $rsm = new ResultSetMapping();
    $data['kategoriCount'] = $kategoriCount;

    // All kecamatan
    $qs = 'SELECT * FROM kecamatan order by nama';
    $allKecamatanQuery = $mysqli->query($qs);
    $allKecamatan = $allKecamatanQuery->fetch_all(MYSQLI_ASSOC);
    $data['kecamatan'] = $allKecamatan;

    if (isset($_SESSION['sekolahId'])) {
        $data['loggedIn'] = true;
    }
    echo $twig->render('browse.html', $data);
?>q
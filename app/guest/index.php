<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();
    $sekolahId = $_GET['sekolahId'];

    $sekolah = $entity_manager->find('Edusite\Model\Sekolah', $sekolahId);
    if ($sekolah == null) {
        die('Error: sekolah is not found');
    }

    $menu = 'biodata';
    if (isset($_GET['menu'])) {
        $menu = $_GET['menu'];
    }

    $data = array(
        'sekolah' => $sekolah
    );
    if (isset($_SESSION['sekolahId'])) {
        $data['sekolahId'] = $_SESSION['sekolahId'];
    }
    $page = "guest/$menu.html";

    if ($menu == 'siswaperkelas') {
        $query = $entity_manager->createQuery("SELECT ds FROM Edusite\Model\Sekolah s JOIN Edusite\Model\DeskripsiTahun ds WHERE ds.sekolah = $sekolahId ORDER BY ds.tahun ASC");
        $selectResult = $query->getResult();
        $data['items'] = $selectResult;
    }
    if ($menu == 'siswaperrb') {
        $query = $entity_manager->createQuery("SELECT ds FROM Edusite\Model\Sekolah s JOIN Edusite\Model\DeskripsiTahun ds WHERE ds.sekolah = $sekolahId ORDER BY ds.tahun ASC");
        $selectResult = $query->getResult();
        $data['items'] = $selectResult;
    }
    if ($menu == 'tingkatlulus') {
        $query = $entity_manager->createQuery("SELECT ds FROM Edusite\Model\Sekolah s JOIN Edusite\Model\DeskripsiTahun ds WHERE ds.sekolah = $sekolahId ORDER BY ds.tahun ASC");
        $selectResult = $query->getResult();
        $data['items'] = $selectResult;
    }
    if ($menu == 'lanjutstudi') {
        $query = $entity_manager->createQuery("SELECT ds FROM Edusite\Model\Sekolah s JOIN Edusite\Model\DeskripsiTahun ds WHERE ds.sekolah = $sekolahId ORDER BY ds.tahun ASC");
        $selectResult = $query->getResult();
        $data['items'] = $selectResult;
    }
    if ($menu == 'fasilitas') {
        if (!empty($_GET['page']) && !empty($_GET['id'])) {
            $f = $entity_manager->find('Edusite\Model\Fasilitas', $_GET['id']);
            $data = array('sekolah' => $sekolah,'f' => $f);

            echo $twig->render("user/updateFasilitas.html", $data);
            die();
        }

        $query = $entity_manager->createQuery("SELECT f FROM Edusite\Model\Sekolah s JOIN Edusite\Model\Fasilitas f WHERE f.sekolah = $sekolahId ORDER BY f.nama ASC");
        $selectResult = $query->getResult();
        $data['items'] = $selectResult;
    }
        
    if ($menu == 'bangunan') {
        $query = $entity_manager->createQuery("SELECT f FROM Edusite\Model\Sekolah s JOIN Edusite\Model\Bangunan f WHERE f.sekolah = $sekolahId ORDER BY f.nama ASC");
        $selectResult = $query->getResult();
        $data['items'] = $selectResult;
    }

    if ($menu == 'bantuan') {
        $query = $entity_manager->createQuery("SELECT f FROM Edusite\Model\Sekolah s JOIN Edusite\Model\Bantuan f WHERE f.sekolah = $sekolahId ORDER BY f.nama ASC");
        $selectResult = $query->getResult();
        $data['items'] = $selectResult;
    }

    if ($menu == 'pegawai') {
        $query = $entity_manager->createQuery("SELECT f FROM Edusite\Model\Sekolah s JOIN Edusite\Model\Pegawai f WHERE f.sekolah = $sekolahId ORDER BY f.nama ASC");
        $selectResult = $query->getResult();
        $data['items'] = $selectResult;
    } 
	
	if ($menu == 'maps_data') {
        $query = $entity_manager->createQuery("SELECT * FROM sekolah");
        $selectResult = $query->getResult();
        $data['items'] = $selectResult;
    }

    echo $twig->render($page, $data);
    die();

?>
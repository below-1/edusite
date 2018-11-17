<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();
    if (empty($_SESSION['sekolahId'])) {
        header("Location: /app/login.php");
        die();
    }

    $sekolahId = $_SESSION['sekolahId'];

    $sekolah = $entity_manager->find('Edusite\Model\Sekolah', $sekolahId);
    if ($sekolah == null) {
        die('Error: sekolah is not found');
    }

    if (empty($_GET['menu'])) {
        echo $twig->render('user/biodata.html', array('sekolah' => $sekolah));
        die();
    }
    $menu = $_GET['menu'];

    if ($menu == 'siswaperkelas') {
        $query = $entity_manager->createQuery("SELECT ds FROM Edusite\Model\Sekolah s JOIN Edusite\Model\DeskripsiTahun ds WHERE ds.sekolah = $sekolahId ORDER BY ds.tahun ASC");
        $selectResult = $query->getResult();
        echo $twig->render("user/$menu.html", array('sekolah' => $sekolah, 'items' => $selectResult));
        die();
    }

    if ($menu == 'siswaperrb') {
        $query = $entity_manager->createQuery("SELECT ds FROM Edusite\Model\Sekolah s JOIN Edusite\Model\DeskripsiTahun ds WHERE ds.sekolah = $sekolahId ORDER BY ds.tahun ASC");
        $selectResult = $query->getResult();
        echo $twig->render("user/$menu.html", array('sekolah' => $sekolah, 'items' => $selectResult));
        die();
    }

    if ($menu == 'lanjutstudi') {
        $query = $entity_manager->createQuery("SELECT ds FROM Edusite\Model\Sekolah s JOIN Edusite\Model\DeskripsiTahun ds WHERE ds.sekolah = $sekolahId ORDER BY ds.tahun ASC");
        $selectResult = $query->getResult();
        echo $twig->render("user/$menu.html", array('sekolah' => $sekolah, 'items' => $selectResult));
        die();
    }

    if ($menu == 'tingkatlulus') {
        $query = $entity_manager->createQuery("SELECT ds FROM Edusite\Model\Sekolah s JOIN Edusite\Model\DeskripsiTahun ds WHERE ds.sekolah = $sekolahId ORDER BY ds.tahun ASC");
        $selectResult = $query->getResult();
        echo $twig->render("user/$menu.html", array('sekolah' => $sekolah, 'items' => $selectResult));
        die();
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
        echo $twig->render("user/$menu.html", array('sekolah' => $sekolah, 'items' => $selectResult));
        die();
    }

    if ($menu == 'pegawaipns') {
        $query = $entity_manager->createQuery("SELECT f FROM Edusite\Model\Sekolah s JOIN Edusite\Model\Pegawai f WHERE f.sekolah = $sekolahId ORDER BY f.nama ASC");
        $selectResult = $query->getResult();
        echo $twig->render("user/$menu.html", array('sekolah' => $sekolah, 'items' => $selectResult));
        die();
    }

    if ($menu == 'bangunan') {
        $query = $entity_manager->createQuery("SELECT f FROM Edusite\Model\Sekolah s JOIN Edusite\Model\Bangunan f WHERE f.sekolah = $sekolahId ORDER BY f.tahun ASC");
        $selectResult = $query->getResult();
        echo $twig->render("user/$menu.html", array('sekolah' => $sekolah, 'items' => $selectResult));
        die();
    }

    if ($menu == 'bantuan') {
        $query = $entity_manager->createQuery("SELECT f FROM Edusite\Model\Sekolah s JOIN Edusite\Model\Bangunan f WHERE f.sekolah = $sekolahId ORDER BY f.tahun ASC");
        $selectResult = $query->getResult();
        echo $twig->render("user/$menu.html", array('sekolah' => $sekolah, 'items' => $selectResult));
        die();
    }

    /** Paud menus */
    if ($menu == 'paudjumlahsiswa') {
        echo $twig->render("user/$menu.html", array('sekolah' => $sekolah));    
        die();
    }
    
    if ($menu == 'image') {
        echo $twig->render("user/$menu.html", array('sekolah' => $sekolah));    
        die();
    }

    echo $twig->render("user/$menu.html", array('sekolah' => $sekolah));
    die();

?>
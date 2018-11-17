<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();

    try {
        $username = $_POST['username'];
        $password = $_POST['password'];

    } catch (Exception $ex) {
        $data = array('message' => 'Error parsing form');
        echo $twig->render('login.html', $data);
        die();
    }

    $query = array(
        'username' => $username,
        'password' => $password
    );
    $sekolah = $entity_manager->getRepository('Edusite\Model\Sekolah')->findOneBy($query);
    if ($sekolah == null) {
        $data = array(
            'message' => 'Tidak dapat menemukan user. Periksa kembali username dan password anda'
        );
        echo $twig->render('login.html', $data);
        die();
    }
    $_SESSION['username'] = $username;
    $_SESSION['sekolahId'] = $sekolah->getId();
    $_SESSION['sekolahNama'] = $sekolah->getNama();
    $_SESSION['sekolahKategori'] = $sekolah->getKategori();
    
    header("Location: /app/user/index.php");
    die();
?>
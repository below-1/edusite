<?php
    use Doctrine\ORM\Query\ResultSetMapping;

    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();

    $data = json_decode(file_get_contents('php://input'), true);

    // Which kecamatan selected by user.
    $selectedKec = $data['kecamatan'];

    // TODO:
    //  1. Summary by school category
    //  2. Akreditas
    //  3. bangunan
    //  4. Status: (Swasta dan Negri)
    
    $mysqli = new mysqli($DB_HOST, $DB_USER,$DB_PASSWORD, $DB_NAME);
    $selKec = implode(',', array_map(function ($it) { return "'$it'"; }, $selectedKec));

    $qs = 'SELECT * FROM kecamatan order by nama';
    $allKecamatanQuery = $mysqli->query($qs);
    $allKecamatan = $allKecamatanQuery->fetch_all(MYSQLI_ASSOC);

    // 1. Summary by school category.
    $qs = "SELECT s.kategori, COUNT(s.kategori) as total FROM sekolah s WHERE s.kecamatan in ($selKec) GROUP BY s.kategori ";
    $qResult = $mysqli->query($qs);
    $kategoriCount = $qResult->fetch_all(MYSQLI_ASSOC);

    $allKategori = [1, 2, 3, 4];
    $existKey = array_map(function ($kc) {  return $kc['kategori']; }, $kategoriCount);
    
    // Fill empty values kategoriCount
    foreach ($allKategori as $k) {
        if ( !in_array($k, $existKey) ) {
            array_push($kategoriCount, [
                'kategori' => $k,
                'total' => 0
            ]);
        }
    }
    

    // 2. Akreditasi
    $qResult = $mysqli->query("SELECT s.statusAkreditasi as akreditasi, COUNT(s.statusAkreditasi) as total FROM sekolah s WHERE s.kecamatan in ($selKec) GROUP BY s.statusAkreditasi");
    $akreditasiCount = $qResult->fetch_all(MYSQLI_ASSOC);

    $allAkreditasi = ['A', 'B', 'C', 'D', 'BELUM'];
    $existKey = array_map(function ($kc) {  return $kc['akreditasi']; }, $akreditasiCount);
    // Fill empty values kategoriCount
    foreach ($allAkreditasi as $k) {
        if ( !in_array($k, $existKey) ) {
            array_push($akreditasiCount, [
                'akreditasi' => $k,
                'total' => 0
            ]);
        }
    }

    // 4. Swasta dan Negri
    $qResult = $mysqli->query("SELECT s.statusAkreditasi as akreditasi, COUNT(s.statusAkreditasi) as total FROM sekolah s WHERE s.kecamatan in ($selKec) GROUP BY s.statusAkreditasi");
    
    $result = [
        'kategori' => $kategoriCount,
        'akreditasi' => $akreditasiCount
    ];
    header('Content-Type: application/json');
    echo json_encode($result);
    die();
?>
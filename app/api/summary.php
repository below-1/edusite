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
    $qStr = "SELECT s.negriSwasta as sn, COUNT(s.negriSwasta) as total FROM sekolah s WHERE s.kecamatan in ($selKec) GROUP BY s.negriSwasta";
    // echo $qStr;
    $qResult = $mysqli->query($qStr);
    $snCount = $qResult->fetch_all(MYSQLI_ASSOC);
    $allPossible = ['SWASTA', 'NEGRI'];
    $existKey = array_map(function ($kc) {  return $kc['sn']; }, $snCount);
    // Fill empty values kategoriCount
    foreach ($allPossible as $k) {
        if ( !in_array($k, $existKey) ) {
            array_push($snCount, [
                'sn' => $k,
                'total' => 0
            ]);
        }
    }

    // 3. Bangunan, Bantuan, Fasilias
    $qStrBangunan = "SELECT b.kondisi as kategori, COUNT(b.kondisi) as total 
            FROM `bangunan` b JOIN sekolah s ON b.sekolah_id = s.id 
            WHERE s.kecamatan IN ($selKec) AND b.tahun = YEAR(NOW())
            GROUP BY b.kondisi";
    $qStrFasilitas = "SELECT b.kondisi as kategori, COUNT(b.kondisi) as total 
            FROM `fasilitas` b JOIN sekolah s ON b.sekolah_id = s.id 
            WHERE s.kecamatan IN ($selKec)
            GROUP BY b.kondisi";
    $qStrBantuan = "SELECT b.kondisi as kategori, COUNT(b.kondisi) as total 
            FROM `bantuan` b JOIN sekolah s ON b.sekolah_id = s.id 
            WHERE s.kecamatan IN ($selKec) AND b.tahun = YEAR(NOW())
            GROUP BY b.kondisi";

    $allKategori = ['SANGAT BURUK', 'BURUK', 'NORMAL', 'BAIK', 'SANGAT BAIK'];
    $bbf = [];
    $qResultBangunan = $mysqli->query($qStrBangunan);
    $qResultFasilitas = $mysqli->query($qStrFasilitas);
    $qResultBantuan = $mysqli->query($qStrBantuan);

    $bangunanCount = $qResultBangunan->fetch_all(MYSQLI_ASSOC);
    $bantuanCount = $qResultBantuan->fetch_all(MYSQLI_ASSOC);
    $fasilitasCount = $qResultFasilitas->fetch_all(MYSQLI_ASSOC);

    // 4. Bantuan, Fasilitas, Bangunan
    for ($i = 0; $i < count($allKategori); $i++) {
        $currKategori = $allKategori[$i];
        $bbf[$currKategori] = 0;

        for ($j = 0; $j < count($bangunanCount); $j++) {
            if ($bangunanCount[$j]['kategori'] == $currKategori) {
                $bbf[$currKategori] += $bangunanCount[$j]['total'];
            }
        }

        for ($j = 0; $j < count($bantuanCount); $j++) {
            if ($bantuanCount[$j]['kategori'] == $currKategori) {
                $bbf[$currKategori] += $bantuanCount[$j]['total'];
            }
        }

        for ($j = 0; $j < count($fasilitasCount); $j++) {
            if ($fasilitasCount[$j]['kategori'] == $currKategori) {
                $bbf[$currKategori] += $fasilitasCount[$j]['total'];
            }
        }
    }
    $bbf_result = array();
    $len = count($bbf);
    foreach ($bbf as $k => $v) {
        array_push($bbf_result, array(
            'kategori' => $k,
            'total' => $v
        ));
    }

    // 5. Jumlah Siswa
    $selKec = implode(',', array_map(function ($it) { return "'$it'"; }, $selectedKec));
    $qResult = $mysqli->query("SELECT s.kategori as kategori, SUM(s.JumlahSiswa) as total FROM sekolah s WHERE s.kecamatan in ($selKec) GROUP BY s.kategori");
    $jumlahCount = $qResult->fetch_all(MYSQLI_ASSOC);

    $allKategori = [1, 2, 3, 4];
    $existKey = array_map(function ($kc) {  return $kc['kategori']; }, $jumlahCount);
    // Fill empty values kategoriCount
    foreach ($allKategori as $k) {
        if ( !in_array($k, $existKey) ) {
            array_push($jumlahCount, [
                'kategori' => $k,
                'total' => 0
            ]);
        }
    }
    
    $result = [
        'kategori' => $kategoriCount,
        'akreditasi' => $akreditasiCount,
        'sn' => $snCount,
        'bbf' => $bbf_result,
        'jumlahCount' => $jumlahCount
    ];
    header('Content-Type: application/json');
    echo json_encode($result);
    die();
?>
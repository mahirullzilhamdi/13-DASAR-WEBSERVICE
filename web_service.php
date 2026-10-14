
<?php

header('Content-Type: application/json');

require_once "koneksi.php";
require_once "mhs.php";

$hasil = array();

$s_name = $_GET['name'] ?? '';
$s_umur = $_GET['umur'] ?? '';
$s_API = $_GET['API'] ?? '';

$mhs = new MhsWebService();

if ($mhs->validateAPI($s_API)) {

    $mhs->setName($s_name);
    $mhs->setUmur($s_umur);

    $data = $mhs->getMhs();

    foreach ($data as $r) {
        $hasil[] = array(
            'nama' => $r->nama,
            'umur' => $r->umur,
            'alamat' => $r->alamat
        );
    }

    $hasil['status'] = true;

} else {
    $hasil['status'] = false;
}

echo json_encode($hasil);

?>

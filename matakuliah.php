
<?php
header('Content-Type: application/json');

require_once "koneksi.php";

$objAr = new ActiveRecord();

$sql = "SELECT * FROM matakuliah";

$data = $objAr->fetchObject($sql);

$hasil = array();

foreach ($data as $r) {
    $hasil[] = array(
        'Kode' => $r->Kode,
        'Nama_mk' => $r->Nama_mk,
        'SKS' => $r->SKS,
        'Kurikulum' => $r->Kurikulum,
        'Praktik' => $r->Praktik
    );
}

echo json_encode($hasil);
?>

<?php
class Koneksi {
    protected $dns = "mysql:host=localhost;dbname=akademik";
    protected $db_user = "root";
    protected $db_pass = "";
    protected $konek = "";

    public function getKon() {
        try {
            $db = new PDO($this->dns, $this->db_user, $this->db_pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($db == false) {
                throw new Exception("Koneksi Gagal");
            } else {
                $this->konek = $db;
            }
        } catch (Exception $e) {
            echo "Error : " . $e->getMessage();
        }

        return $this->konek;
    }

    public function closeKon() {
        $this->konek = NULL;
    }
}

class ActiveRecord extends Koneksi {
        public $id;
        public $nama;
        public $alamat;
        public $umur;
        public $Kode;
    public $Nama_mk;
    public $SKS;
    public $Kurikulum;
    public $Praktik;
        public function fetchObject($sql) {
        $clone = array();

        try {
            $data = $this->getKon()->prepare($sql);
            $data->setFetchMode(PDO::FETCH_INTO, $this);
            $data->execute();

            while ($result = $data->fetch()) {
                $clone[] = clone $result;
            }

            $this->closeKon();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $clone;
    }
}

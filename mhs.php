<?php
require_once "koneksi.php";

class MhsWebService {
    protected $name;
    protected $umur;

    // API untuk client
    protected $API = 'khss8363621';

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setUmur($umur) {
        $this->umur = $umur;
    }

    public function getUmur() {
        return $this->umur;
    }

    public function validateAPI($api) {
        if ($this->API !== $api) {
            return false;
        }

        return true;
    }

    public function getMhs() {
        $objAr = new ActiveRecord();

        $sql = "SELECT * FROM mhs WHERE 1=1";

        if ($this->getName()) {
            $sql .= " AND nama LIKE '%{$this->getName()}%' ";
        }

        if ($this->getUmur()) {
            $sql .= " AND umur LIKE '%{$this->getUmur()}%' ";
        }

        return $objAr->fetchObject($sql);
    }
}

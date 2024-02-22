<?php

class koneksi {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $databasename = "pweb_k2_2023_001";
    private $port = "3306";
    public $koneksi;

    public function __construct() {
        $this->koneksi = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->databasename,
            $this->port
        );

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
}

$db = new koneksi(); // Create a new instance of the Database class

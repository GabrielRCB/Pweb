<?php
include_once __DIR__."/../Config/koneksi.php";

class Kategori{
    public $id;
    public $nama;
    
    public static function getAll(){
        $query = "select * from kategori";
        $connection = new koneksi();
        $mq = mysqli_query($connection->koneksi,$query);
        $result = [];
        while($katDB = mysqli_fetch_object($mq)){
            $kat = new Kategori();
            $kat->id = $katDB->id;
            $kat->nama = $katDB->nama;
            $result[] = $kat;
        }
        return $result;
    }
    public static function getByPrimaryKey($id){
        $query = "select * from kategori where id=?";
        $conection = new koneksi();
        $stmt = mysqli_prepare($conection->koneksi,$query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$id,$nama);
        $result = [];
        while($katDB = mysqli_stmt_fetch($stmt)){
            $kat = new Kategori();
            $kat->id = $id;
            $kat->nama = $nama;
            $result = $kat;
        }
        mysqli_stmt_close($stmt);
        return $result;
    }
    public function insert(){
        $query = "insert into kategori(nama) values ('$this->nama')";
        $connection = new koneksi();
        mysqli_query($connection->koneksi,$query);
    }
    public function update(){
        $query = "update kategori set nama='$this->nama' where id='$this->id'";
        $connection = new koneksi();
        mysqli_query($connection->koneksi,$query);
    }
    public function delete(){
        $query = "delete from kategori where id='$this->id'";
        $connection = new koneksi();
        mysqli_query($connection->koneksi,$query);
    }


    }
?>
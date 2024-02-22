<?php
include_once __DIR__ . '/../Config/Koneksi.php';
include_once __DIR__ . '/Kategori.php';
class Produk
{
    public $id;
    public $kode;
    public $nama;
    public $harga;
    public $stok;
    public $gambar;
    public $id_kategori;
    public $kategori;

    /**
     * Fungsi yang digunakan untuk mengambil semua data produk
     * @return Array
     */
    public static function getAll(): array
    {
        $query = 'select * from produk where deleted_at is null';
        $connection = new Koneksi();
        $mq = mysqli_query($connection->koneksi, $query);
        $result = [];
        while ($prDB = mysqli_fetch_object($mq)) {
            $pr = new Produk();
            $pr->id = $prDB->id;
            $pr->kode = $prDB->kode;
            $pr->nama = $prDB->nama;
            $pr->harga = $prDB->harga;
            $pr->stok = $prDB->stok;
            $pr->gambar = $prDB->gambar ?? 'no-image.png';
            $pr->id_kategori = $prDB->id_kategori;
            $pr->kategori = Kategori::getByPrimaryKey($prDB->id_kategori);
            $result[] = $pr;
        }
        return $result;
    }

    public function insert()
    {
        $query = "insert into produk(kode,nama,harga,stok,id_kategori,gambar) values "
            . "('$this->kode','$this->nama','$this->harga','$this->stok','$this->id_kategori','$this->gambar')";
        $connection =  new Koneksi();
        mysqli_query($connection->koneksi, $query);
    }

    public static function getByPrimaryKey($id)
    {
        $query = "select * from produk where id='$id'";
        $connection =  new Koneksi();
        $mq = mysqli_query($connection->koneksi, $query);
        $result = null;
        while ($prDB = mysqli_fetch_object($mq)) {
            $produk = new Produk();
            $produk->id = $prDB->id;
            $produk->kode = $prDB->kode;
            $produk->nama = $prDB->nama;
            $produk->harga = $prDB->harga;
            $produk->stok = $prDB->stok;
            $produk->gambar = $prDB->gambar ?? 'no-image.png';
            $produk->id_kategori = $prDB->id_kategori;
            $result = $produk;
        }
        return $result;
    }

    public function update()
    {
        $query = "update produk set "
            . "kode = '$this->kode', "
            . "nama = '$this->nama', "
            . "harga = '$this->harga', "
            . "stok = '$this->stok', "
            . "gambar = '$this->gambar',"
            . "id_kategori = '$this->id_kategori'"
            . "where id='$this->id'";
            var_dump($query);
        $connection =  new Koneksi();
        mysqli_query($connection->koneksi, $query);
    }
    public function delete()
    {
        $query = "delete from produk where id='$this->id'";
        $connection = new Koneksi();
        mysqli_query($connection->koneksi, $query);
    }
    public function softDelete(){
        $query = "update produk set deleted_at=now() where id='$this->id'";
        $connection = new Koneksi();
        mysqli_query($connection->koneksi, $query);
    }

}


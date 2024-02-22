<?php
include_once __DIR__.'/../../Model/Produk.php';
include_once __DIR__."/../../Config/role_validation.php";

if(isset($_REQUEST['id'])===false){
    echo "Data tidak ada.";
    echo "<br/> <a href='/index.php'>Kembali<a/>";
    exit;
    }else{
        $id = $_REQUEST['id'];
        $produk= Produk::getByPrimarykey($id);
        if ($produk == null) {
            echo "Data produk tidak ditemukan!<br/> <a href='/index.php'>kembali<a/>";
            exit;
    }
}
#ambil semua parameter non-id
$kode = $_REQUEST['kode'];
$nama = $_REQUEST['nama'];
$harga = $_REQUEST['harga'];
$stok = $_REQUEST['stok'];
$id_kategori = $_REQUEST['id_kategori'];

#set ke objek
$produk->kode = $kode;
$produk->nama = $nama;
$produk->harga = $harga;
$produk->stok = $stok;
$produk->id_kategori = $id_kategori;
#update data di database
$produk->update();

header('Location: /index.php');


?>
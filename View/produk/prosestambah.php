<?php
include_once __DIR__.'/../../Model/Produk.php';
#ambil semua parametter yang di kirim via form tadi dan di simpan di variable

$kode = $_REQUEST['kode'];
$nama = $_REQUEST['nama'];
$harga = $_REQUEST['harga'];
$stok = $_REQUEST['stok'];
$id_kategori = $_REQUEST['id_kategori'];

#ambil data gambar
$ekstensi = '.jpg';
if($_FILES['gambar']['type'] == 'image/png'){
    $ekstensi = '.png';
}
$namaFile = md5(date('d-m-y H:i:s')).$ekstensi;
$namaSementara = $_FILES['gambar']['tmp_name'];

#tentukan lokasi upload
$dirUpload = __DIR__."/../../images/";

#upload / pindahkan file nya
$terupload = move_uploaded_file($namaSementara,$dirUpload.$namaFile);

if($terupload){
#buat objek baru dari produk dan set semua field nya
$produk = new Produk();
$produk->kode = $kode;
$produk->nama = $nama;
$produk->harga = $harga;
$produk->stok = $stok;
$produk->gambar = $namaFile;
$produk->id_kategori = $id_kategori;
$produk->insert();

header('Location: /index.php');
}else{
    echo "Gagal Upload Gambar!";
}


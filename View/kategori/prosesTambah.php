<?php
include_once __DIR__.'/../../Model/Kategori.php';
#ambil semua parametter yang di kirim via form tadi dan di simpan di variable


$nama = $_REQUEST['nama'];

#buat objek baru dari produk dan set semua field nya
$kategori = new Kategori();
$kategori->nama = $nama;
$kategori->insert();

header('Location: /index.php');
<?php
include_once __DIR__.'/../../Model/Kategori.php';

if(isset($_REQUEST['id'])===false){
    echo "Data tidak ada.";
    echo "<br/> <a href='/index.php'>Kembali<a/>";
    exit;
    }else{
        $id = $_REQUEST['id'];
        $kategori= Kategori::getByPrimarykey($id);
        if ($kategori == $id) {
            echo "Data produk tidak ditemukan!<br/> <a href='/index.php'>kembali<a/>";
            exit;
    }
}
#ambil semua parameter non-id

$nama = $_REQUEST['nama'];


#set ke objek
$kategori->nama = $nama;

#update data di database
$kategori->update();

header('Location: /index.php');


?>
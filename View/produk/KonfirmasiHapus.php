<?php
include_once __DIR__. '/../../Model/Produk.php';
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $produk = Produk::getByPrimaryKey($id);
}else{
    header('Location: /index.php');

}
?>
    <h1>Anda Yakin menghapus data ini?</h1>
    <p><b>Kode :</b><?=$produk->kode?></p>
    <p><b>Nama :</b><?=$produk->nama?></p>
    <form action="/View/produk/prosesHapus.php" method="post">
    <input type="hidden" name="id" value="<?=$produk->id?>"/>
    <a class="btn btn-info" href="/index.php">kembali</a>
    <button class="btn btn-danger" type="submit">YA</button>
    </form>
    
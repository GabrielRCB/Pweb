<?php
include_once __DIR__.'/../../Model/Produk.php';
include_once __DIR__."/../../Config/role_validation.php";
 


$id = $_REQUEST['id'];
$produk = Produk::getByPrimaryKey($id);
$produk->softDelete();
header('Location: /index.php');

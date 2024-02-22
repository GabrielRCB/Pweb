<?php
include_once __DIR__."/../../Model/Kategori.php";
include_once __DIR__."/../../Config/role_validation.php";

$id = $_REQUEST['id'];
$kategori = Kategori::getByPrimaryKey($id);
$kategori->delete();
header('Location: /index.php?page=listkategori');
<?php
include_once __DIR__ . "/../../Model/Produk.php";
$listProduk = Produk::getAll();
?>

<h1>Data Produk</h1>
    <table width='100%' class="table table-striped table-bordered">
        <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>ID_kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Action</th>
        </tr>
        <?php foreach ($listProduk as $produk) { ?>
            <tr>
                <td><?= $produk->id ?></td>
                <td><?= $produk->kode ?></td>
                <td><?= $produk->nama ?></td>
                <td><?= $produk->kategori == null ? '-': $produk->kategori->nama ?></td>
                <td class="text-right"><?= $produk->harga ?></td>
                <td class="text-right"><?= $produk->stok ?></td>
                <td><img src="/images/<?=$produk->gambar ?>"  height="100" alt="" srcset=""></td>
                <td>
                    <a class="btn btn-sm btn-dark" href="/index.php?id=<?= $produk->id ?>&page=editeProduk">
                    <i class="fa fa-edit"></i>
                </a>
                    <a class="btn btn-sm btn-danger" href="/index.php?id=<?= $produk->id ?>&page=deleteProduk ">
                    <i class="fa fa-trash"></i>
                </a>
                </td>
            </tr>
        <?php } ?>
    </table>
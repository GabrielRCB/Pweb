<?php
include_once __DIR__ . '/../../Model/Produk.php';
include_once __DIR__ . '/../../Model/Kategori.php';
if (isset($_REQUEST['id']) === false) {
    echo "Data tidak ditemukan.<br/> <a href='/index.php'>Kembali</a>";
    exit;
} else {
    $id = $_REQUEST['id'];
    $produk = Produk::getByPrimaryKey($id);
    if ($produk == null) {
        echo "Data tidak ditemukan.<br/> <a href='/index.php'>Kembali</a>";
        exit;
    }
}
$listkategori = Kategori::getAll();

?>

    <h1>Ubah Produk</h1>
    <form action="/View/produk/prosesUbah.php" method="post">
    <div class="form-group">
            <label for="">kode</label>
            <input type="text" name="kode" value="<?= $produk->kode ?>"  class="form-control" />
            </div>
    <div class="form-group">
            <label for="">nama</label>
            <input type="text" name="nama" value="<?= $produk->nama ?>"  class="form-control" />
            </div>
    <div class="form-group">
            <label for="">harga</label>
            <input type="number" name="harga" min="1" value="<?= $produk->harga ?>" class="form-control" />
            </div>
    <div class="form-group">
            <label for="">Stok</label>
            <input type="number" name="stok" min="0" value="<?= $produk->stok ?>" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Kategori</label><br/>
                <select name="id_kategori" class="form-control" id="">
                    <?php foreach ($listkategori as $kategori) {?>
                        <option <?=$kategori->id == $produk->id_kategori ? 'selected' : '' ?>
                         value="<?=$kategori->id?>"><?=$kategori->nama?>
                        </option>

                  <?php } ?>      
                </select>
                </div>
        <input type="hidden" name="id" value="<?=$produk->id ?>">
        <a class="btn btn-info" href="/index.php">Kembali</a>
        <button class="btn btn-dark" type="reset">Reset</button>
        <button class="btn btn-success" type="submit">Simpan Data</button>
    </form>

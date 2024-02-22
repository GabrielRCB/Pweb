<?php
include_once __DIR__ . '/../../Model/Kategori.php';

if (isset($_REQUEST['id'])) {
    // ambil id dari URL
    $id = $_REQUEST['id'];

    // ambil data kategori berdasarkan id
    $kategori = Kategori::getByPrimaryKey($id);
}
?>

<h1>Ubah kategori</h1>
<form action="/View/kategori/prosesUbah.php" method="post">
    <div class="form-group">
        <label for="nama">Nama</label>
        <!-- menampilkan nama sebelumnya di dalam value -->
        <input type="text" name="nama" value="<?= $kategori->nama ?>" class="form-control" id="nama" />
    </div>
    <input type="hidden" name="id" value="<?= $kategori->id ?>">
    <a class="btn btn-info" href="/index.php">Kembali</a>
    <button class="btn btn-dark" type="reset">Reset</button>
    <button class="btn btn-success" type="submit">Simpan Data</button>
</form>

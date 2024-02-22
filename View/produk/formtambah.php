<?php
    include_once __DIR__."/../../Model/Kategori.php";
     $listkategori = kategori::getAll();
    ?>

    <h1>tambah produk</h1>
    <form action="/View/produk/prosestambah.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">kode</label>
            <input type="text" class="form-control" name="kode" required />
            </div>
        <div class="form-group">
            <label for="">nama</label>
            <input type="text" class="form-control" name="nama" required />
            </div>
        <div class="form-group">
            <label for="">harga</label>
            <input type="number" min="1" class="form-control" name="harga" required />
            </div>
        <div class="form-group">
            <label for="">stok</label>
            <input type="number" min="0" class="form-control" name="stok" required />
            </div>

        <div class="form-group">
            <label for="">Gambar</label>
            <input accept=".jpg,.png" type="file" class="form-control" name="gambar" id="">
            </div>    
            
            <div class="form-group">
                <label for="">Kategori</label><br/>
                <select name="id_kategori" class="form-control" id="">
                    <?php foreach ($listkategori as $kategori) {?>
                        <option value="<?=$kategori->id?>">
                        <?=$kategori->nama?>
                        </option>

                  <?php } ?>      
                </select>
                </div>

            <a class="btn btn-info" href="/index.php">kembali</a>

    <button class="btn btn-success" type="submit">Simpan</button>
    </form>
    

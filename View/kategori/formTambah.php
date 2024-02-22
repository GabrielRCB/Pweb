<?php
    include_once __DIR__."/../../Model/Kategori.php";
     $listkategori = kategori::getAll();
    ?>

    <h1>tambah kategori</h1>
    <form action="/View/kategori/prosestambah.php" method="post">
        
        <div class="form-group">
            <label for="">nama</label>
            <input type="text" class="form-control" name="nama" required />
            </div>
       
                  

            <a class="btn btn-info" href="/index.php">kembali</a>

    <button class="btn btn-success" type="submit">Simpan</button>
    </form>
    

<?php
include_once __DIR__."/../../Model/Kategori.php";
$listkategori = Kategori::getAll();
?>

<h1>Data Kategori</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
    </thead>
    <body>

        <?php
        $no = 1;
        foreach ($listkategori as $kategori){
            ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $kategori->nama?></td>
                <td>
                    <a class="btn btn-sm btn-dark" href="/index.php?id=<?= $kategori->id ?>&page=editekategori">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button class="btn btn-sm btn-danger btn-hapus" data-id='<?=$kategori->id?>' type="button">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php } ?>
    </body>
</table>

<script>
    $(function(){
        $('.btn-hapus').click(function() {
            let idkategori = $(this).data('id');
            Swal.fire({
                title: 'Apakah kamu yakin ingin menghapus data ini?' + idkategori,
                text: "data yang sudah di hapus tidak akan bisa kembali setelah di hapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = '/View/kategori/prosesHapus.php?id='+idkategori;
            
                }
            })
        });
    });
</script>
<div>
    <h1 class="GS" style="margin-left: 50px; margin-top:30px ;">Gallery System</h1>
    <h3 class="Gs" style="margin-left: 50px; margin-top: 10px ">Selamat datang di Gallery Website :D</h3>
</div>
<div class="container">
    <div class="row">
        <?php
        $tampil = mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.UserID=user.UserID");
        foreach ($tampil as $tampils):
            ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card" style="margin-top: 40px">
                    <img src="uploads/<?= $tampils['LokasiFile'] ?>" class="object-fit-cover" style="aspect-ratio: 16/9;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $tampils['JudulFoto'] ?></h5>
                        <h6 class="card-title"><?= $tampils['DeskipsiFoto'] ?></h6>
                        <p class="card-text text-muted">by: <?= $tampils['Username'] ?></p>
                        <a href="?url=detail&&id=<?= $tampils['FotoID'] ?>" class="btn btn-primary">Detail</a>
                        <a href="?url=edit&&IDFoto=<?= $tampils['FotoID'] ?>" class="btn btn-success">Edit</a>
                        <a href="#" onclick="return confirmDelete(<?= $tampils['FotoID'] ?>)"
                            class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
    function confirmDelete(id) {
        var result = confirm("Apakah anda yakin ingin menghapus foto dengan ID <?= $tampils['FotoID'] ?>?");
        if (result) {
            window.location.href = "?url=hapus&&id=" + id;
        }
        return false;
    }
</script>
<?php 
$details=mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.UserID=user.UserID WHERE foto.FotoID='$_GET[id]'");
$data=mysqli_fetch_array($details);
?>
<div class="container">
    <div class="row">
        <div class="col-6" style="margin-top: 30px">
            <div class="card">
            <img src="uploads/<?= $data['LokasiFile'] ?>" <?= $data['JudulFoto']?> class="object-fit-cover">
            <div class="card-body">
            <h3 class="card-title mb-0"><?= $data['JudulFoto'] ?> <a href="<?php if(isset($_SESSION['user_id'])){echo '?url=like&&id='.$data['FotoID']. '';}else{echo 'login.php';} ?>" ></a></h3>
            <small class="text-muted mb-3">by:<?= $data['Username'] ?>, <?= $data['TanggalUnggah'] ?></small>
            <p><?= $data['DeskipsiFoto'] ?></p>
           
            <form action="?url=detail" method="post">
                <div class="form-group d-flex flex-row">
                    <input type="hidden" name="foto_id" value="<?= $data['FotoID'] ?>">
                    <a href="?url-home" class="btn btn-secondary" style="font-weight:bold;">Kembali</a>
                    <?php if(isset($_SESSION['user_id'])):?>
                    
                    <?php endif;?>
                </div>
            </form>
            </div>
        </div>
        </div>
        <div class="col-6">

        </div>
    </div>
</div>
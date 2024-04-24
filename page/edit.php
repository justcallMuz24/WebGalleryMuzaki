<div class="container">
    <div class="row" style="justify-content : center ; margin-top: 50px;">
        <div class="col-5">
            <div class="card" style="background-color: #003C43;" > 
                <div class="card-body">
                    <h4 style="color: #fff;">Halaman Upload</h4>
                    <?php
                    $submit = @$_POST['update'];
                    if ($submit == 'Update') {
                        $IDFoto = @$_POST['FotoID'];
                        $judul_foto = @$_POST['judul_foto'];
                        $deskripsi_foto = @$_POST['deskipsi_foto'];
                        $nama_file = @$_FILES["namafile"]["name"];
                        $tmp_foto = @$_FILES['namafile']['tmp_name'];
                        $tanggal = date('Y-m-d');
                        $album_id = @$_POST['album_id'];
                        $user_id = @$_SESSION['user_id'];
                        if (move_uploaded_file($tmp_foto, 'uploads/' . $nama_file)) {
                            $insert = mysqli_query($conn, "UPDATE foto SET JudulFoto = '$judul_foto', DeskipsiFoto = '$deskripsi_foto', LokasiFile = '$nama_file' WHERE FotoID = '$IDFoto' ");
                            echo 'Gambar Berhasil Tersimpan';
                            echo '<meta http-equiv="refresh" content="0.8; url=?url=upload">';
                        } else {
                            echo 'Gambar Gagal Disimpan';
                            echo '<meta http-equiv="refresh" content="0.8; url=?url=upload">';
                        }
                    }
                    $album = mysqli_query($conn, "SELECT * FROM album ");
                    $IDFoto = $_GET['IDFoto'];
                    $foto = mysqli_query($conn, "SELECT * FROM foto WHERE FotoID = '$IDFoto' ");
                    $DataFoto = mysqli_fetch_array($foto);

                    ?>
                    <form action="?url=edit&IDFoto=<?php echo $IDFoto;?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">    
                            <label style="color: #fff;">Judul Foto</label>
                            <input type="hidden" class="form-control" value = "<?php echo $DataFoto['FotoID'];?>" required name="FotoID">
                            <input type="text" class="form-control" value = "<?php echo $DataFoto['JudulFoto'];?>" required name="judul_foto">
                        </div>
                        <div class="form-group">
                            <label style="color: #fff;">Deskripsi Foto</label>
                            <textarea name="deskipsi_foto" class="form-control" required cols="30" rows="5"><?php echo $DataFoto['DeskipsiFoto'];?></textarea>
                        </div>
                        <div class="form-group">
                            <label style="color: #fff;">Pilih Gambar</label>
                            <img src="uploads/<?php echo $DataFoto['LokasiFile'];?>" alt="" style = "height: 70px; width: 100px;">
                            <input type="file" name="namafile" class="form-control" required>
                            <small class="text-danger">File harus berupa: *.jpg, *.png *.gif</small>
                         </div>
                        <input type="submit" value="Update" name="update" class="btn btn-success my-3">
                        <a href="?url-home" class="btn btn-danger" style="font-weight:bold;">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
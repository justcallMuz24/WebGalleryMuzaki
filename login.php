<?php include 'koneksi.php';
session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Muzaki</title>
  
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #1E0342 ;
        }
        form {
            background-color: #0E46A3;
            padding: 2rem;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: 300px;
        }
        h1 {
            text-align: center;
            margin-bottom: 1rem;
            font-size: 35px;
            margin-top: 16px;
            color : #fff;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 0.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 1rem;
        }
        input[type="submit"]:hover {    
            background-color: #0056b3;
        }
        
    </style>
</head>

<body>
    <div class="container">
    <div>
    <h1 class="Welcome" style="color: #fff; font-size: 50px; position: center; ">SELAMAT DATANG</h1>
    </div>
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <?php
                        $submit = @$_POST['submit'];
                        if ($submit == 'Login') {
                            $username = $_POST['username'];
                            $password = md5($_POST['password']);

                            $sql = mysqli_query($conn, "SELECT * FROM user WHERE Username='$username' AND Password='$password' ");
                            $cek = mysqli_num_rows($sql);
                            if ($cek != 0) {
                                $sesi = mysqli_fetch_array($sql);
                                echo 'Login Berhasil!';
                                $_SESSION['username'] = $sesi['Username'];
                                $_SESSION['user_id'] = $sesi['UserID'];
                                $_SESSION['email'] = $sesi['Email'];
                                $_SESSION['nama_lengkap'] = $sesi['NamaLengkap'];
                                echo '<meta http-equiv="refresh" content="0.8; url=./">';
                            } else {
                                echo "Maaf, Login Gagal";
                                echo '<meta http-equiv="refresh" content="0.8; url=login.php">';
                            }
                        }
                        ?>

                        <form action="login.php" method="post">
                            <h1>Login</h1>
                            <div class="form-group">
                                <label style="color: #fff;">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="form-group">
                                <label style="color: #fff ; margin-top: 10px;" >Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <input type="submit" value="Login" class="btn btn-danger my-3" name="submit">
                            <p style="color: #fff;">Belum Punya Akun? <a href="daftar.php" class="link-danger" style="color: #C65BCF;">Klik untuk mendaftar</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
include "koneksi.php";

if (isset($_POST['username'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];

    if($username == "" || $password == "" || $email == "" || $nama_lengkap == "" || $alamat == ""){
        echo '<script>alert("Semua data harus di isi.")</script>';

    }else{
        $query = mysqli_query($koneksi, "INSERT into user (username,password,email,nama_lengkap,alamat)
        VALUES ('$username','$password','$email','$nama_lengkap','$alamat')");

        if($query){

			echo '<script>alert("Registrasi akun berhasil")</script>';
		}else{
			echo'<script>alert("Registrasi akun  gagal")</script>';
		}
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sign Up - Aplikasi Perpustakaan Digital</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="perpus_logo.png" alt="logo" width="275">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="username">Username :</label>
                      <input id="username" type="text" class="form-control" name="username" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="password">Password :</label>
                      <input id="password" type="password" class="form-control" name="password">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap :</label>
                    <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email :</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat :</label>
                    <input id="alamat" type="text" class="form-control" name="alamat">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="level">Level :</label>
                    <input id="level" type="text" class="form-control" name="level" value="peminjam">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
             
                  </div>

        

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                  <div class="mt-5 text-muted text-center">
              Sudah mempunyai akun? <a href="login.php">Login</a>
            </div>
                </form>
              </div>
            </div>
            
       
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/auth-register.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>
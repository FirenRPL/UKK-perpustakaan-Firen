<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['user'])) {
	header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Aplikasi Perpustakaan Digital</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

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
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
              </div>
              <p style="text-align: center; color:grey;">No incoming messages</p>
             
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
              
              </div>
              <p style="text-align: center; color:grey;">No notifications come in</p>

              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li> <?php
                    if (isset($_SESSION['user']['level'])) ;
                    ?>
                

          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?php echo $_SESSION['user']['nama_lengkap']; ?>
                
</div></a>
            <div class="dropdown-menu dropdown-menu-right">
            <a href="profile.php" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <?php
              if($_SESSION['user']['level'] != 'admin')
              if($_SESSION['user']['level'] != 'petugas'){
                ?>
              <a href="activity.php" class="dropdown-item has-icon">
                <i class="fas fa-history"></i> Activities
              </a>
              <?php
              }
              ?>

              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="activity.php"><img src="perpus_logo.png" alt="logo" width="220"></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
          <a href="activity.php"><img src="p_logo.png" alt="brand" width="48"></a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
              <a href="index.php" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
             
            </li>
            <li class="menu-header">Pages</li>
            <?php
    if($_SESSION['user']['level'] !='peminjam'){
?>

            <li class="dropdown">
              <a href="kategori.php" class="nav-link " ><i class="fas fa-th-large"></i> <span>Kategori</span></a>
            </li>
            <li class="dropdown">
              <a href="buku.php" class="nav-link " ><i class="fas fa-book"></i> <span>Buku</span></a>
            </li>
            <?php
    }else{
            ?>
            <li class="dropdown">
              <a href="peminjaman.php" class="nav-link " ><i class="fas fa-pen"></i> <span>Peminjaman</span></a>
            </li>
            <li class="dropdown">
              <a href="ulasan_prib.php" class="nav-link " ><i class="fas fa-comment"></i> <span>Ulasan</span></a>
            </li>
            <?php
    }
    ?>
       <?php
    if($_SESSION['user']['level'] !='peminjam'){
?>
            <li class="dropdown">
              <a href="ulasan.php" class="nav-link " ><i class="fas fa-comment"></i> <span>Ulasan</span></a>
            </li>
            <li class="dropdown active">
            <a href="history.php" class="nav-link " ><i class="fas fa-history"></i> <span>History</span></a>
            </li>
            <?php
    }
    ?>
            
            <li class="menu-header"></li>
            <li class="dropdown">
              <a href="logout.php" class="nav-link " ><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
            </li>

           
      </div>
  </ul>
  </aside>
    </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>History Peminjaman</h1>
                <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#" style="color: grey;">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="activity.php">Activity</a></div>
                </div>
            </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                            <thead style="font-weight: bold; font-size:16px; background-color:#6777ef;">
                            <tr>
                        <th style="color: white;">No</th>
                        <th style="color: white;">Nama</th>
                        <th style="color: white;">Buku</th>
                        <th style="color: white;">Tanggal Pinjam</th>
                        <th style="color: white;">Tanggal Pengembalian</th>
                        <th style="color: white;">Jumlah buku</th>
                        <th style="color: white;">Status</th>
                        
                    </tr>
                            </thead>
                            <tbody>
                            <?php
                        $i =1;
                        $query = mysqli_query($koneksi, "SELECT*FROM peminjaman left join user on user.id_user = peminjaman.id_user
                        left join buku on buku.id_buku = peminjaman.id_buku WHERE peminjaman.id_user=" .$_SESSION['user']['id_user']);
                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                
                                <td><?php echo $i;?></td>
                                <td><?php echo $data['nama_lengkap'];?></td>
                                <td><?php echo $data['judul'];?></td>
                                <td><?php echo $data['tanggal_peminjaman'];?></td>
                                <td><?php echo $data['tanggal_pengembalian'];?></td>
                                <td><?php echo $data['jml_pinjam_buku'];?></td>
                                <td><?php echo $data['status_peminjaman'];?></td>
                                
                            

                   
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </section>
      </div>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2024 <div class="bullet"></div>By <a href="#">Perpustakaan Digital</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
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
  <script src="assets/modules/datatables/datatables.min.js"></script>
  <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/modules-datatables.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>
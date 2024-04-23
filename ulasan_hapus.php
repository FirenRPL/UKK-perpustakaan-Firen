<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query ($koneksi, "DELETE FROM ulasan_buku where id_ulasan=$id" );

if ($query){
    echo '<script>alert("Data berhasil di hapus");location.href="ulasan.php";</script>';
}else{
    echo '<script>alert("Data gagal di hapus");location.href="ulasan.php";</script>';

}
?>
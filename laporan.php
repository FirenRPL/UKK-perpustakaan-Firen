<?php
session_start();
	include "koneksi.php";
	if (isset($_SESSION['user']['level'])) {
	$where ="";
	}else{
	$where = " WHERE peminjaman.id_user=" . $_SESSION['user']['id_user'];
	}
	?>

<table border="1" width="100%" cellpadding="5" cellspacing="0">
	<tr>
		<th colspan="9">
			<h2>Laporan Peminjaman Buku</h2>
		</th>
	</tr>
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Buku</th>
		<th>Tanggal Pinjam</th>
		<th>Tanggal Pengembalian</th>
		<th>Jumlah Buku</th>
		<th>Status</th>

	</tr>
			<?php
			$i =1;
			$query = mysqli_query($koneksi, "SELECT*FROM peminjaman left join user on user.id_user = peminjaman.id_user left join
			 buku on buku.id_buku = peminjaman.id_buku $where");
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

	<script type="text/javascript">
		window.print()
	</script>

	
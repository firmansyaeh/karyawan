<?php
if (isset($_POST['submit']))
		{?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pendaftaran Pasien</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_pendaftaran_pasien.xls");
	include("../../library/koneksi.php");
	$bln = $_POST['bln'] ;
	$thn = $_POST['thn'] ;
	?>

	

	
		
		<?php 
		
		
		// koneksi database
		if ($bln == 'all') {
			?>
			<center>
		<h1>Pendaftaran Pasien Tahun <?php echo $thn;?></h1>
	</center>
			<table border="1">
			<tr>
			<th>No</th>
           <th>ID Pasien</th>
           <th>Tanggal Daftar</th>
           <th>Nama Pasien</th>
           <th>Provinsi</th>
           <th>Kabupaten</th>
           <th>Kecamatan</th>
           <th>Kelurahan</th>
           <th>Alamat</th>
           <th>Jenis Kelamin</th>
           <th>Pekerjaan</th>
           <th>Umur</th>
           <th>Orang Tua/ Wali</th>
		</tr>
			<?php
			// menampilkan data pegawai
		$data2 = mysqli_query($koneksi,"SELECT a.id, a.tanggal_daftar, a.nama, d.nama_provinsi, e.nama_kabupaten, f.nama_kecamatan, g.nama_kelurahan, a.alamat, a.jenis_kelamin, a.pekerjaan, a.umur, a.orangtua FROM data_pasien a
                                    INNER JOIN provinsi d ON d.id_prov = a.provinsi
                                    INNER JOIN kabupaten e ON e.id_kab = a.kabupaten
                                    INNER JOIN kecamatan f ON f.id_kec = a.kecamatan
                                    INNER JOIN kelurahan g ON g.id_kel = a.kelurahan where YEAR(a.tanggal_daftar) = '$thn'
			 ");
		$no = 1;
		while($row = mysqli_fetch_array($data2)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td class="center"><?php echo $row["id"];?></td>
			<td><?php echo date('d/m/Y', strtotime($row['tanggal_daftar']))?></td>
			<td class="center"><?php echo $row["nama"];?></td>
           <td class="center"><?php echo $row["nama_provinsi"];?></td>
           <td class="center"><?php echo $row["nama_kabupaten"];?></td>
           <td class="center"><?php echo $row["nama_kecamatan"];?></td>
           <td class="center"><?php echo $row["nama_kelurahan"];?></td>
           <td class="center"><?php echo $row["alamat"];?></td>
           <td class="center"><?php echo $row["jenis_kelamin"];?></td>
           <td class="center"><?php echo $row["pekerjaan"];?></td>
           <td class="center"><?php echo $row["umur"];?></td>
           <td class="center"><?php echo $row["orangtua"];?></td>
		</tr>
		<?php
		}
		$data3 = mysqli_query($koneksi,"SELECT tanggal_daftar, count(id) as total_jumlah FROM data_pasien where YEAR(tanggal_daftar) = '$thn'");
		while($row2 = mysqli_fetch_array($data3)){
			?>
			<tr>

				<td colspan="6" align="center">JUMLAH PASIEN</td>
				<td colspan="7" align="center"><?php echo $row2['total_jumlah'];?></td>
			</tr>
			<?php
		}?>

		</table>
		<?php
	}
	else{
	?>	
	<center>
		<h1>Pendaftaran Pasien Bulan <?php echo $bln;?> Tahun <?php echo $thn;?></h1>
	</center>
	<table border="1">
<tr>
			<th>No</th>
           <th>ID Pasien</th>
           <th>Tanggal Daftar</th>
           <th>Nama Pasien</th>
           <th>Provinsi</th>
           <th>Kabupaten</th>
           <th>Kecamatan</th>
           <th>Kelurahan</th>
           <th>Alamat</th>
           <th>Jenis Kelamin</th>
           <th>Pekerjaan</th>
           <th>Umur</th>
           <th>Orang Tua/ Wali</th>
		</tr>
		<?php
		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"SELECT a.id, a.tanggal_daftar, a.nama, d.nama_provinsi, e.nama_kabupaten, f.nama_kecamatan, g.nama_kelurahan, a.alamat, a.jenis_kelamin, a.pekerjaan, a.umur, a.orangtua FROM data_pasien a
                                    INNER JOIN provinsi d ON d.id_prov = a.provinsi
                                    INNER JOIN kabupaten e ON e.id_kab = a.kabupaten
                                    INNER JOIN kecamatan f ON f.id_kec = a.kecamatan
                                    INNER JOIN kelurahan g ON g.id_kel = a.kelurahan where YEAR(a.tanggal_daftar) = '$thn' AND MONTH(a.tanggal_daftar) = '$bln' ");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td class="center"><?php echo $d["id"];?></td>
			<td><?php echo date('d/m/Y', strtotime($d['tanggal_daftar']))?></td>
			<td class="center"><?php echo $d["nama"];?></td>
           <td class="center"><?php echo $d["nama_provinsi"];?></td>
           <td class="center"><?php echo $d["nama_kabupaten"];?></td>
           <td class="center"><?php echo $d["nama_kecamatan"];?></td>
           <td class="center"><?php echo $d["nama_kelurahan"];?></td>
           <td class="center"><?php echo $d["alamat"];?></td>
           <td class="center"><?php echo $d["jenis_kelamin"];?></td>
           <td class="center"><?php echo $d["pekerjaan"];?></td>
           <td class="center"><?php echo $d["umur"];?></td>
           <td class="center"><?php echo $d["orangtua"];?></td>
		</tr>
		<?php 
		}
		$data3 = mysqli_query($koneksi,"SELECT tanggal_daftar, count(id) as total_jumlah FROM data_pasien where YEAR(tanggal_daftar) = '$thn' AND MONTH(tanggal_daftar) = '$bln'");
		while($row2 = mysqli_fetch_array($data3)){
			?>
			<tr>

				<td colspan="6" align="center">JUMLAH PASIEN</td>
				<td colspan="7" align="center"><?php echo $row2['total_jumlah'];?></td>
			</tr>
			<?php
		}
	}


		?>
	</table>
	
</body>
</html>
<?php }?>


<?php

	include("../../library/koneksi.php");
	$bln = $_POST['bln'] ;
		$thn = $_POST['thn'] ;
	?>

	<?php
	if ($bln == 'all') {
		?>
		<div  class="table-responsive">
		<table id="bootstrap-data-table-export" class="table table-striped table-bordered bootstrap-datatable ">
        <thead>
		<tr>
                                            <th>No</th>
                                            <th>ID Pasien</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Nama Pasien</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Umur</th>
                                            <th>Orang Tua/ Wali</th>
                                           <th >Action</th>
                                         
                                        </tr>
</thead>
 <tbody>
		<?php 
		$data5 = mysqli_query($koneksi,"SELECT a.id, a.tanggal_daftar, a.nama, d.nama_provinsi, e.nama_kabupaten, f.nama_kecamatan, g.nama_kelurahan, a.alamat, a.jenis_kelamin, a.pekerjaan, a.umur, a.orangtua FROM data_pasien a
                                    INNER JOIN provinsi d ON d.id_prov = a.provinsi
                                    INNER JOIN kabupaten e ON e.id_kab = a.kabupaten
                                    INNER JOIN kecamatan f ON f.id_kec = a.kecamatan
                                    INNER JOIN kelurahan g ON g.id_kel = a.kelurahan where YEAR(a.tanggal_daftar) = '$thn'");
		$no = 1;
		while($row = mysqli_fetch_array($data5)){
		?>
		<tr>
                                            <td class="center"><?php echo $no++;?></td>
                                            <td class="center"><?php echo $row["id"];?></td>
                                            <td class="center"><?php echo $row["tanggal_daftar"];?></td>
                                            <td class="center"><?php echo $row["nama"];?></td>
                                            <td class="center"><?php echo $row["jenis_kelamin"];?></td>
                                            <td class="center"><?php echo $row["umur"];?></td>
                                            <td class="center"><?php echo $row["orangtua"];?></td>
                                            <td>
                                        
                                         <?php echo"<a href='../proses/detail_pasien.php?id_pasien=$row[id]' class='btn btn-secondary fa fa-question-circle' > Detail</a>"?></td>
                                        </tr>
		
		<?php 
		}
		?>
    </tbody>
	</table>
</div>

	<?php
$data6 = mysqli_query($koneksi,"SELECT tanggal_daftar, count(id) as total_jumlah FROM data_pasien where YEAR(tanggal_daftar) = '$thn'");
		while($row4 = mysqli_fetch_array($data6)){
			?>
			

				<h5 align="center">JUMLAH PASIEN= <?php echo $row4['total_jumlah'];?></h5>
				
			<?php
		}
	?>
		<?php
	}
	else{ ?>

<div  class="table-responsive">
	<table id="bootstrap-data-table-export" class="table table-striped table-bordered bootstrap-datatable ">
        <thead>
		<tr>
                                            <th>No</th>
                                            <th>ID Pasien</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Nama Pasien</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Umur</th>
                                            <th>Orang Tua/ Wali</th>
                                           <th >Action</th>
                                         
                                        </tr>
</thead>
 <tbody>
		<?php 
		$data = mysqli_query($koneksi,"SELECT a.id, a.tanggal_daftar, a.nama, d.nama_provinsi, e.nama_kabupaten, f.nama_kecamatan, g.nama_kelurahan, a.alamat, a.jenis_kelamin, a.pekerjaan, a.umur, a.orangtua FROM data_pasien a
                                    INNER JOIN provinsi d ON d.id_prov = a.provinsi
                                    INNER JOIN kabupaten e ON e.id_kab = a.kabupaten
                                    INNER JOIN kecamatan f ON f.id_kec = a.kecamatan
                                    INNER JOIN kelurahan g ON g.id_kel = a.kelurahan where YEAR(a.tanggal_daftar) = '$thn' AND MONTH(a.tanggal_daftar) = '$bln' ");
		$no = 1;
		while($row = mysqli_fetch_array($data)){
		?>
		 <tr>
                                            <td class="center"><?php echo $no++;?></td>
                                            <td class="center"><?php echo $row["id"];?></td>
                                            <td class="center"><?php echo $row["tanggal_daftar"];?></td>
                                            <td class="center"><?php echo $row["nama"];?></td>
                                            <td class="center"><?php echo $row["jenis_kelamin"];?></td>
                                            <td class="center"><?php echo $row["umur"];?></td>
                                            <td class="center"><?php echo $row["orangtua"];?></td>
                                            <td>
                                        
                                         <?php echo"<a href='../proses/detail_pasien.php?id_pasien=$row[id]' class='btn btn-secondary fa fa-question-circle' > Detail</a>"?></td>
                                        </tr>
		
		<?php 
		}
		?>
    </tbody>
	</table>
</div>
	<?php
$data4 = mysqli_query($koneksi,"SELECT tanggal_daftar, count(id) as total_jumlah FROM data_pasien where YEAR(tanggal_daftar) = '$thn' AND MONTH(tanggal_daftar) = '$bln'");
		while($row3 = mysqli_fetch_array($data4)){
			?>
			

				<h5 align="center">JUMLAH PASIEN= <?php echo $row3['total_jumlah'];?></h5>
				
			<?php
		}
	?>
	<?php

}

?>
 
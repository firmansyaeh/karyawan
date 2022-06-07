<?php
	if (isset($_POST['submit']))
	{
        //mengambil data dari tabel karyawan//
    $nik=$_POST['ipnik'];
    $nama=$_POST['ipnama'];
    $tanggal_lahir=$_POST['iptgl'];
    $usia=$_POST['ipusia'];
    $jenis_kelamin=$_POST['ipjk'];
    $pendidikan=$_POST['ipen'];
    $jabatan=$_POST['ijab'];
    $jurusan=$_POST['ipjus'];
    $golongan_darah=$_POST['ipgol'];
    $vaksin=$_POST['ipvak'];
    $no_hp=$_POST['ipnohp'];
    $agama=$_POST['ipagam'];
    $lokasi=$_POST['iplok'];
    $awal_kontrak=$_POST['ipawal'];
    $akhir_kontrak=$_POST['ipak'];
    $masa_kerja_lintasarta=$_POST['ipmalin'];
    $mulai_kerja_la=$_POST['ipmulik'];
    $status_kerja=$_POST['ipstts'];
    $tinggal_sekarang=$_POST['iptinggl'];
    //buat sql//
    include "../koneksi.php";
    $sql=" INSERT INTO tbl_datakaryawan(ipnik, ipnama, iptgl, ipusia, ipjk, ipen, ijab, ipjus, ipgol, ipvak, ipnohp, ipagam, iplok, ipawal, ipak, ipmalin, ipmulik, ipstts, iptinggl) VALUES ('$nik','$nama','$tanggal_lahir','$usia','$jenis_kelamin','$pendidikan','$jabatan','$jurusan','$golongan_darah','$vaksin','$no_hp','$agama','$lokasi','$awal_kontrak','$akhir_kontrak','$masa_kerja_lintasarta','$mulai_kerja_la','$status_kerja','$tinggal_sekarang') ";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan datakaryawan Error");

    if ($query){
        echo "<script>window.location.assign('?page=datakaryawan&actions=tambah');</script>";
    }else{
        echo"<script>alert('Simpan Data Gagal');<script>";
    }
    } 

?>

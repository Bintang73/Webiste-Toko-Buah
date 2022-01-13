<?php
// koneksi database
include '../../auth/koneksi.php';
// menangkap data yang di kirim dari form tambah kategori
$id = $_POST['konsumen_id'];
$email = $_POST['konsumen_email'];
$alamat = $_POST['konsumen_alamat'];
$kodepos = $_POST['konsumen_kodepos'];
// menginput data ke database
mysqli_query($koneksi, "insert into konsumen values('$id','$email', '$alamat', '$kodepos')");
// mengalihkan halaman kembali ke tampilkategori.php
header("location:http://localhost/index.php?page=konsumen");

<?php
// koneksi database
include '../../auth/koneksi.php';
// menangkap data yang di kirim dari form tambah kategori
$id = $_POST['distributor_id'];
$nama = $_POST['distributor_name'];
$date = $_POST['distributor_date'];
$company = $_POST['distributor_company'];
// menginput data ke database
mysqli_query($koneksi, "insert into distributor values('$id','$date', '$nama', '$company', '$id')");
// mengalihkan halaman kembali ke tampilkategori.php
header("location:http://localhost/index.php?page=distributor");

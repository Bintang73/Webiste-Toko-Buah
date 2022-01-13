<?php
// koneksi database
include '../../auth/koneksi.php';
// menangkap data yang di kirim dari form tambah kategori
$id = $_POST['id'];
$nama = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$pass = $_POST['pass'];
// menginput data ke database
mysqli_query($koneksi, "insert into karyawan_toko values('$id','$nama', '$email', '$username', '$pass')");
// mengalihkan halaman kembali ke tampilkategori.php
header("location:http://localhost/index.php?page=karyawan");

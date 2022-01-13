<?php
// koneksi database
include '../../auth/koneksi.php';
// menangkap data yang di kirim dari form
$karyawan_id = $_POST['id'];
$karyawan_name = $_POST['nama'];
$karyawan_email = $_POST['email'];
$karyawan_username = $_POST['username'];
$karyawan_pass = $_POST['pass'];
// update data ke database
mysqli_query($koneksi, "update karyawan_toko set nama='$karyawan_name' where id='$karyawan_id'");
mysqli_query($koneksi, "update karyawan_toko set email='$karyawan_email' where id='$karyawan_id'");
mysqli_query($koneksi, "update karyawan_toko set username='$karyawan_username' where id='$karyawan_id'");
mysqli_query($koneksi, "update karyawan_toko set pass='$karyawan_pass' where id='$karyawan_id'");
// mengalihkan halaman kembali ke index.php
header("location:http://localhost/index.php?page=karyawan");

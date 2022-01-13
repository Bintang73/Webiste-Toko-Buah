<?php
// koneksi database
include '../../auth/koneksi.php';
// menangkap data yang di kirim dari form tambah kategori
$id = $_POST['product_id'];
$nama = $_POST['product_name'];
$exp = $_POST['product_exp'];
// menginput data ke database
mysqli_query($koneksi, "insert into product values('$id','$nama', '$exp', '$id')");
// mengalihkan halaman kembali ke tampilkategori.php
header("location:http://localhost/index.php?page=product");

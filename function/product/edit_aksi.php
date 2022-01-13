<?php
// koneksi database
include '../../auth/koneksi.php';
// menangkap data yang di kirim dari form
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_exp = $_POST['product_exp'];
// update data ke database
mysqli_query($koneksi, "update product set product_name='$product_name' where
product_id='$product_id'");
mysqli_query($koneksi, "update product set product_exp='$product_exp' where
product_id='$product_id'");
// mengalihkan halaman kembali ke index.php
header("location:http://localhost/index.php?page=product");

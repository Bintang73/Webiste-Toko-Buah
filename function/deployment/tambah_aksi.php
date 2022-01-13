<?php
// koneksi database
include '../../auth/koneksi.php';
// menangkap data yang di kirim dari form tambah kategori
$id = $_POST['deployment_id'];
$provinsi = $_POST['deployment_provinsi'];
$negara = $_POST['deployment_negara'];
$kodepos = $_POST['deployment_kodepos'];
// menginput data ke database
mysqli_query($koneksi, "insert into product_deployment values('$id','$provinsi', '$negara', '$kodepos')");
// mengalihkan halaman kembali ke tampilkategori.php
header("location:http://localhost/index.php?page=deployment");

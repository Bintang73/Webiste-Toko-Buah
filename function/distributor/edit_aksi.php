<?php
// koneksi database
include '../../auth/koneksi.php';
// menangkap data yang di kirim dari form
$distributor_id = $_POST['distributor_id'];
$distributor_date = $_POST['distributor_date'];
$distributor_name = $_POST['distributor_name'];
$distributor_company = $_POST['distributor_company'];
$distributor_konsumenid = $_POST['distributor_konsumenid'];
// update data ke database
mysqli_query($koneksi, "update distributor set distributor_name='$distributor_name' where
distributor_id='$distributor_id'");
mysqli_query($koneksi, "update distributor set distributor_date='$distributor_date' where
distributor_id='$distributor_id'");
mysqli_query($koneksi, "update distributor set distributor_company='$distributor_company' where
distributor_id='$distributor_id'");
mysqli_query($koneksi, "update distributor set distributor_konsumenid='$distributor_konsumenid' where
distributor_id='$distributor_id'");
// mengalihkan halaman kembali ke index.php
header("location:http://localhost/index.php?page=distributor");

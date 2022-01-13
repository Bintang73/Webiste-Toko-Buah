<?php
// koneksi database
include '../../auth/koneksi.php';
// menangkap data yang di kirim dari form
$konsumen_id = $_POST['konsumen_id'];
$konsumen_email = $_POST['konsumen_email'];
$konsumen_alamat = $_POST['konsumen_alamat'];
$konsumen_kodepos = $_POST['konsumen_kodepos'];
// update data ke database
mysqli_query($koneksi, "update konsumen set konsumen_email='$konsumen_email' where konsumen_id='$konsumen_id'");
mysqli_query($koneksi, "update konsumen set konsumen_alamat='$konsumen_alamat' where konsumen_id='$konsumen_id'");
mysqli_query($koneksi, "update konsumen set konsumen_kodepos='$konsumen_kodepos' where konsumen_id='$konsumen_id'");
// mengalihkan halaman kembali ke index.php
header("location:http://localhost/index.php?page=konsumen");

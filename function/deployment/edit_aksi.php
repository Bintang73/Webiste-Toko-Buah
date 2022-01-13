<?php
// koneksi database
include '../../auth/koneksi.php';
// menangkap data yang di kirim dari form
$deployment_id = $_POST['deployment_id'];
$deployment_provinsi = $_POST['deployment_provinsi'];
$deployment_negara = $_POST['deployment_negara'];
$deployment_kodepos = $_POST['deployment_kodepos'];
// update data ke database
mysqli_query($koneksi, "update product_deployment set deployment_provinsi='$deployment_provinsi' where
deployment_id='$deployment_id'");
mysqli_query($koneksi, "update product_deployment set deployment_negara='$deployment_negara' where
deployment_id='$deployment_id'");
mysqli_query($koneksi, "update product_deployment set deployment_kodepos='$deployment_kodepos' where
deployment_id='$deployment_id'");
// mengalihkan halaman kembali ke index.php
header("location:http://localhost/index.php?page=deployment");

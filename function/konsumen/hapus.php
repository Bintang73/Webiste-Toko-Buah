<?php
// koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "toko_buah");
// menangkap data id yang di kirim dari url
$id = $_GET['konsumen_id'];
// menghapus data dari database
mysqli_query($koneksi, "delete from konsumen where konsumen_id='$id'");
// mengalihkan halaman kembali ke halaman tampilkategori.php
header("location:http://localhost/index.php?page=konsumen");

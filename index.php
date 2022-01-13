<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <!-- menghubungkan dengan file css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

</head>

<body>
    <div class="content">
        <header>
            <h1 class="judul">TOKO "BUAH"</h1>
            <h3 class="deskripsi">Jalan Juanda No. 1 Cilacap Utara</h3>
        </header>
        <div class="menu"></br>
            <ul>
                <li><a href="index.php?page=beranda">BERANDA</a></li>
                <li><a href="index.php?page=product">PRODUK</a></li>
                <li><a href="index.php?page=karyawan">KARYAWAN</a></li>
                <li><a href="index.php?page=konsumen">KONSUMEN</a></li>
                <li><a href="index.php?page=distributor">DISTRIBUTOR</a></li>
                <li><a href="index.php?page=deployment">PENYEBARAN</a></li>
                <li><a href="index.php?page=tentang">TENTANG</a></li>
            </ul>
        </div>
        <div class="badan">
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                switch ($page) {
                    case 'beranda':
                        include "views/beranda.php";
                        break;
                    case 'product':
                        include "views/product.php";
                        break;
                    case 'karyawan':
                        include "views/karyawan.php";
                        break;
                    case 'konsumen':
                        include "views/konsumen.php";
                        break;
                    case 'distributor':
                        include "views/distributor.php";
                        break;
                    case 'deployment':
                        include "views/deployment.php";
                        break;
                    case 'tentang':
                        include "views/tentang.php";
                        break;
                    default:
                        echo "<center><h3>Maaf. Halaman tidak di temukan
!</h3></center>";
                        break;
                }
            } else {
                include "views/beranda.php";
            }
            ?>
        </div>
    </div>
</body>

</html>
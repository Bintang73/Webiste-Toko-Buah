<!DOCTYPE html>
<html>

<head>
    <title>Produk</title>
</head>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <center>
                        <h1 class="mt-4">List Produk</h1>
                    </center>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hpmodal">Tambah Produk</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama Produk</th>
                                            <th>Expired</th>
                                            <th>Id Distributor</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        include 'auth/koneksi.php';
                                        $view = mysqli_query($koneksi, "SELECT * FROM `product`");
                                        while ($data = mysqli_fetch_array($view)) {
                                            $idproduk = $data['product_id'];
                                            $namaproduk = $data['product_name'];
                                            $expproduk = $data['product_exp'];
                                            $iddistri = $data['id_distributor'];
                                        ?>
                                            <tr>
                                                <td><?= $idproduk; ?></td>
                                                <td><?= $namaproduk; ?>
                                                <td><?= $expproduk; ?></td>
                                                <td><?= $iddistri; ?></td>
                                                <td>
                                                    <button style="margin: 2px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalupdate<?= $idproduk; ?>">Update</button>
                                                    <button style="margin: 2px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete<?= $idproduk; ?>">Delete</button>
                                                </td>
                                            </tr>

                                        <?php
                                        };

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; <a href="https://github.com/bintang73" style="text-decoration:none;">Bintang Nur Pradana</a></div>
                    </div>
                </div>
            </footer>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="../assets/js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
            <script src="../assets/demo/chart-area-demo.js"></script>
            <script src="../assets/demo/chart-bar-demo.js"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
            <script src="../assets/demo/datatables-demo.js"></script>
        </div>
    </div>
</body>



<!-- delete modal -->
<div class="modal fade" id="modaldelete<?= $idproduk; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <fieldset disabled>
                        <input type="text" name="merk" value="<?= $namaproduk; ?>" class="form-control" required>
                        <br />
                        <input type="text" name="tipe" value="<?= $expproduk; ?>" class="form-control" required>
                        <br />
                    </fieldset>
                    <br />
                    Apakah anda ingin menghapus karyawan ini?
                    <br />
                    <br />
                    <input type="hidden" name="idproduk" value="<?= $idproduk; ?>">
                    <a href="function/product/hapus.php?product_id=<?= $idproduk; ?><button type=" submit" name="deletehp" class="btn btn-danger">Hapus</button></a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- delete modal -->


<div class="modal fade" id="hpmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="function/product/tambah_aksi.php">
                <div class="modal-body">
                    <input type="text" name="product_id" placeholder="Id Produk" class="form-control" required>
                    <br />
                    <input type="text" name="product_name" placeholder="Nama Produk" class="form-control" required>
                    <br />
                    <input type="date" name="product_exp" placeholder="Tanggal Expired" class="form-control" required>
                    <br />
                    <button type="submit" name="inserhp" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- update modal -->
<div class="modal fade" id="modalupdate<?= $idproduk; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="function/product/edit_aksi.php">
                <div class="modal-body">
                    <input type="text" name="product_id" value="<?= $idproduk; ?>" class="form-control" required>
                    <br />
                    <input type="text" name="product_name" value="<?= $namaproduk; ?>" class="form-control" required>
                    <br />
                    <input type="date" name="product_exp" value="<?= $expproduk; ?>" class="form-control" required>
                    <br />
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- update modal -->

</html>
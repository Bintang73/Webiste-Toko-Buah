<!DOCTYPE html>
<html>

<head>
    <title>distributor</title>
</head>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <center>
                        <h1 class="mt-4">List distributor</h1>
                    </center>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hpmodal">Tambah distributor</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id Distributor</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Company</th>
                                            <th>Id Konsumen</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        include 'auth/koneksi.php';
                                        $view = mysqli_query($koneksi, "SELECT * FROM `distributor`");
                                        while ($data = mysqli_fetch_array($view)) {
                                            $iddistributor = $data['distributor_id'];
                                            $datedistributor = $data['distributor_date'];
                                            $namadistributor = $data['distributor_name'];
                                            $companydistributor = $data['distributor_company'];
                                            $konsumeniddistributor = $data['distributor_konsumenid'];
                                        ?>
                                            <tr>
                                                <td><?= $iddistributor; ?></td>
                                                <td><?= $datedistributor; ?>
                                                <td><?= $namadistributor; ?></td>
                                                <td><?= $companydistributor; ?></td>
                                                <td><?= $konsumeniddistributor; ?></td>
                                                <td>
                                                    <button style="margin: 2px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalupdate<?= $iddistributor; ?>">Update</button>
                                                    <button style="margin: 2px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete<?= $iddistributor; ?>">Delete</button>
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
<div class="modal fade" id="modaldelete<?= $iddistributor; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus distributor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <fieldset disabled>
                        <input type="text" name="merk" value="<?= $namadistributor; ?>" class="form-control" required>
                        <br />
                        <input type="text" name="tipe" value="<?= $companydistributor; ?>" class="form-control" required>
                        <br />
                    </fieldset>
                    <br />
                    Apakah anda ingin menghapus distributor ini?
                    <br />
                    <br />
                    <input type="hidden" name="iddistributor" value="<?= $iddistributor; ?>">
                    <a href="function/distributor/hapus.php?distributor_id=<?= $iddistributor; ?><button type=" submit" name="delete" class="btn btn-danger">Hapus</button></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah distributor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="function/distributor/tambah_aksi.php">
                <div class="modal-body">
                    <input type="text" name="distributor_id" placeholder="Id distributor" class="form-control" required>
                    <br />
                    <input type="date" name="distributor_date" placeholder="Date" class="form-control" required>
                    <br />
                    <input type="text" name="distributor_name" placeholder="Nama" class="form-control" required>
                    <br />
                    <input type="text" name="distributor_company" placeholder="Company" class="form-control" required>
                    <br />
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- update modal -->
<div class="modal fade" id="modalupdate<?= $iddistributor; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update distributor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="function/distributor/edit_aksi.php">
                <div class="modal-body">
                    <input type="text" name="distributor_id" value="<?= $iddistributor; ?>" class="form-control" required>
                    <br />
                    <input type="date" name="distributor_date" value="<?= $datedistributor; ?>" class="form-control" required>
                    <br />
                    <input type="text" name="distributor_name" value="<?= $namadistributor; ?>" class="form-control" required>
                    <br />
                    <input type="text" name="distributor_company" value="<?= $companydistributor; ?>" class="form-control" required>
                    <br />
                    <br />
                    <input type="text" name="distributor_konsumenid" value="<?= $konsumeniddistributor; ?>" class="form-control" required>
                    <br />
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- update modal -->

</html>
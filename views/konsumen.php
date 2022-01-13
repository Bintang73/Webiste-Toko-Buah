<!DOCTYPE html>
<html>

<head>
    <title>Konsumen</title>
</head>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <center>
                        <h1 class="mt-4">List Konsumen</h1>
                    </center>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hpmodal">Tambah Konsumen</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Kodepos</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        include 'auth/koneksi.php';
                                        $view = mysqli_query($koneksi, "SELECT * FROM `konsumen`");
                                        while ($data = mysqli_fetch_array($view)) {
                                            $idkonsumen = $data['konsumen_id'];
                                            $emailkonsumen = $data['konsumen_email'];
                                            $alamatkonsumen = $data['konsumen_alamat'];
                                            $kodeposkonsumen = $data['konsumen_kodepos'];
                                        ?>
                                            <tr>
                                                <td><?= $idkonsumen; ?></td>
                                                <td><?= $emailkonsumen; ?>
                                                <td><?= $alamatkonsumen; ?></td>
                                                <td><?= $kodeposkonsumen; ?></td>
                                                <td>
                                                    <button style="margin: 2px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalupdate<?= $idkonsumen; ?>">Update</button>
                                                    <button style="margin: 2px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete<?= $idkonsumen; ?>">Delete</button>
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
<div class="modal fade" id="modaldelete<?= $idkonsumen; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Konsumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <fieldset disabled>
                        <input type="text" name="merk" value="<?= $emailkonsumen; ?>" class="form-control" required>
                        <br />
                        <input type="text" name="tipe" value="<?= $alamatkonsumen; ?>" class="form-control" required>
                        <br />
                    </fieldset>
                    <br />
                    Apakah anda ingin menghapus konsumen ini?
                    <br />
                    <br />
                    <input type="hidden" name="idkonsumen" value="<?= $idkonsumen; ?>">
                    <a href="function/konsumen/hapus.php?konsumen_id=<?= $idkonsumen; ?><button type=" submit" name="deletehp" class="btn btn-danger">Hapus</button></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Konsumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="function/konsumen/tambah_aksi.php">
                <div class="modal-body">
                    <input type="text" name="konsumen_id" placeholder="Id Konsumen" class="form-control" required>
                    <br />
                    <input type="text" name="konsumen_email" placeholder="Email" class="form-control" required>
                    <br />
                    <input type="text" name="konsumen_alamat" placeholder="Alamat" class="form-control" required>
                    <br />
                    <input type="text" name="konsumen_kodepos" placeholder="Kodepos" class="form-control" required>
                    <br />
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- update modal -->
<div class="modal fade" id="modalupdate<?= $idkonsumen; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Konsumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="function/konsumen/edit_aksi.php">
                <div class="modal-body">
                    <input type="text" name="konsumen_id" value="<?= $idkonsumen; ?>" class="form-control" required>
                    <br />
                    <input type="text" name="konsumen_email" value="<?= $emailkonsumen; ?>" class="form-control" required>
                    <br />
                    <input type="text" name="konsumen_alamat" value="<?= $alamatkonsumen; ?>" class="form-control" required>
                    <br />
                    <input type="text" name="konsumen_kodepos" value="<?= $kodeposkonsumen; ?>" class="form-control" required>
                    <br />
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- update modal -->

</html>
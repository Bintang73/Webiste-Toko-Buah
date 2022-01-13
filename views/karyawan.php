<!DOCTYPE html>
<html>

<head>
    <title>Karyawan</title>
</head>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <center>
                        <h1 class="mt-4">List Karyawan</h1>
                    </center>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hpmodal">Tambah Karyawan</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        include 'auth/koneksi.php';
                                        $view = mysqli_query($koneksi, "SELECT * FROM `karyawan_toko`");
                                        while ($data = mysqli_fetch_array($view)) {
                                            $idkaryawan = $data['id'];
                                            $namakaryawan = $data['nama'];
                                            $email = $data['email'];
                                            $username = $data['username'];
                                            $pass = $data['pass'];
                                        ?>
                                            <tr>
                                                <td><?= $idkaryawan; ?></td>
                                                <td><?= $namakaryawan; ?>
                                                <td><?= $username; ?>
                                                <td><?= $email; ?></td>
                                                <td><?= $pass; ?></td>
                                                <td>
                                                    <button style="margin: 2px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalupdate<?= $idkaryawan; ?>">Update</button>
                                                    <button style="margin: 2px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete<?= $idkaryawan; ?>">Delete</button>
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
<div class="modal fade" id="modaldelete<?= $idkaryawan; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <fieldset disabled>
                        <input type="text" name="merk" value="<?= $namakaryawan; ?>" class="form-control" required>
                        <br />
                        <input type="text" name="tipe" value="<?= $email; ?>" class="form-control" required>
                        <br />
                    </fieldset>
                    <br />
                    Apakah anda ingin menghapus karyawan ini?
                    <br />
                    <br />
                    <input type="hidden" name="idkaryawan" value="<?= $idkaryawan; ?>">
                    <a href="function/karyawan/hapus.php?id=<?= $idkaryawan; ?><button type=" submit" name="deletehp" class="btn btn-danger">Hapus</button></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="function/karyawan/tambah_aksi.php">
                <div class="modal-body">
                    <input type="text" name="id" placeholder="Id" class="form-control" required>
                    <br />
                    <input type="text" name="name" placeholder="Nama" class="form-control" required>
                    <br />
                    <input type="email" name="email" placeholder="Email" class="form-control" required>
                    <br />
                    <input type="text" name="username" placeholder="Username" class="form-control" required>
                    <br />
                    <input type="password" name="pass" placeholder="Password" class="form-control" required>
                    <br />
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- update modal -->
<div class="modal fade" id="modalupdate<?= $idkaryawan; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="function/karyawan/edit_aksi.php">
                <div class="modal-body">
                    <input type="text" name="id" value="<?= $idkaryawan; ?>" class="form-control" required>
                    <br />
                    <input type="text" name="nama" value="<?= $namakaryawan; ?>" class="form-control" required>
                    <br />
                    <input type="email" name="email" value="<?= $email; ?>" class="form-control" required>
                    <br />
                    <input type="text" name="username" value="<?= $username; ?>" class="form-control" required>
                    <br />
                    <input type="text" name="pass" value="<?= $pass; ?>" class="form-control" required>
                    <br />
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- update modal -->

</html>
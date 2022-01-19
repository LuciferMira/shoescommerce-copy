
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">My Profile</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="apparel.php" class="text-muted">My Profile</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="<?= base_url('login/update_admin') ?>">
                                  <input type="hidden" name="id" value="<?= $datauser['id'] ?>">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $datauser['nama'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="exampleInputPassword1" disabled value="<?= $datauser['email'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Telp</label>
                                            <input type="text" name="telp" class="form-control" id="exampleInputPassword1" value="<?= $datauser['telepon'] ?>">
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                                            <fieldset class="radio disabled">
                                                <label for="radio1">
                                                    <input type="radio" id="radio1" name="radio" value="" disabled> Laki-laki
                                                </label>
                                            </fieldset>
                                            <fieldset class="radio disabled">
                                                <label>
                                                    <input type="radio" name="radio" value="" checked disabled> Perempuan
                                                </label>
                                            </fieldset>
                                        </div> -->
                                        <!-- <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" disabled value="<?= $datauser['nama'] ?>">
                                        </div> -->
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control" id="exampleInputPassword1" value="<?= $datauser['tanggal_lahir'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                                            <input type="text" name="tmpt_lahir" class="form-control" id="exampleInputPassword1" value="<?= $datauser['tempat_lahir'] ?>">
                                        <div class="form-floating">
                                            <label for="floatingTextarea2">Alamat</label>
                                            <textarea name="alamat" class="form-control" id="floatingTextarea2" style="height: 200px"><?= $datauser['alamat'] ?></textarea>
                                        </div>
                                        <!-- </div><div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Avatar</label>
                                            <input type="file" class="form-control" id="exampleInputPassword1" disabled>
                                        </div> -->
                                    </div>
                                    <!-- <a href="<?= base_url('admin/users/list_') ?>" class="btn btn-danger">Kembali</a> -->
                                    <button type="submit" class="btn btn-success">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by Adminmart. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>

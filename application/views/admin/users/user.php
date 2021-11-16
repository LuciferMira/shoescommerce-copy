<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Tabel User</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Dashboard</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">User</li>
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
                                <h4 class="card-title">Tabel User</h4>
                                <!-- <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#bs-example-modal-lg"><i class="fas fa-plus-circle"></i>
                                </button> -->

                                <!--  Modal content for the above example -->
                                <!-- <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Tambah User</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="exampleInputPassword1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Telp</label>
                                                        <input type="text" class="form-control" id="exampleInputPassword1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                                                        <fieldset class="radio">
                                                            <label for="radio1">
                                                                <input type="radio" id="radio1" name="radio" value=""> Laki-laki
                                                            </label>
                                                        </fieldset>
                                                        <fieldset class="radio">
                                                            <label>
                                                                <input type="radio" name="radio" value="" checked> Perempuan
                                                            </label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                                                        <input type="text" class="form-control" id="exampleInputPassword1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                                                        <input type="date" class="form-control" id="exampleInputPassword1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                                                        <input type="text" class="form-control" id="exampleInputPassword1">
                                                    <div class="form-floating">
                                                        <label for="floatingTextarea2">Isi berita</label>
                                                        <textarea class="form-control" id="floatingTextarea2" style="height: 200px"></textarea>
                                                    </div>
                                                    </div><div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Avatar</label>
                                                        <input type="file" class="form-control" id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                                                    <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> Save</button>
                                                </form>
                                            </div> -->
                                        <!-- </div> -->
                                        <!-- /.modal-content -->
                                    <!-- </div> -->
                                    <!-- /.modal-dialog -->
                                <!-- </div> -->
                                <!-- /.modal -->
                                <div class="table-responsive">
                                <br>
                                    <table class="table">
                                        <thead class="bg-primary text-white">
                                          <tr>
                                              <th>No</th>
                                              <th>Nama</th>
                                              <th>Email</th>
                                              <th>Telepon</th>
                                              <th>Tanggal Daftar</th>
                                              <th>Aksi</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php $no = 1; foreach($users as $row) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->email ?></td>
                                                <td><?= $row->telepon ?></td>
                                                <td><?= date('d/M/Y',strtotime($row->tanggal_daftar)) ?></td>
                                                <td>
                                                  <a href="<?= base_url('admin/users/detail/'.$row->id_user) ?>" class="btn waves-effect waves-light btn-primary"><i class="fas fa-th-list"></i></a>
                                                  <a onclick="deleteConfirm('<?= base_url('admin/users/delete/'.$row->id_user) ?>')" href="#"
                                                    class="btn waves-effect waves-light btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
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
        <script>
        function deleteConfirm(url){
        	$('#btn-delete').attr('href', url);
        	$('#deleteModal').modal();
        }
        </script>
        <!-- Logout Delete Confirmation-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
              </div>
            </div>
          </div>
        </div>

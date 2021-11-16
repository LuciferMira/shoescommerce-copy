
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Tabel Produk</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="text-muted">Dashboard</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Produk</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($this->session->flashdata('success')): ?>
              <div class="col-12">
                    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <strong>Success - </strong><?= $this->session->flashdata('success'); ?>
                    </div>
              </div>
            <?php endif; ?>
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
                                <h4 class="card-title">Tabel Produk</h4>
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#bs-example-modal-lg"><i class="fas fa-plus-circle"></i>
                                </button>

                                <!--  Modal content for the above example -->
                                <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Tambah Produk</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="<?= base_url('admin/produk/add') ?>">
                                                  <input type="hidden" name="user" value="<?= $datauser['id'] ?>">
                                                  <div class="mb-3">
                                                      <label for="exampleInputEmail1" class="form-label">Kode Produk</label>
                                                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kode" maxlength="6">
                                                  </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Kategori</label>
                                                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="kategori">
                                                            <option>--Pilih Kategori--</option>
                                                          <?php foreach($kategori as $row) : ?>
                                                            <option value="<?= $row->id_kategori ?>"><?= $row->nama_kategori ?></option>
                                                          <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Harga</label>
                                                        <input type="number" class="form-control" id="exampleInputPassword1" name="harga">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Save</button>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                <div class="table-responsive">
                                <br>
                                    <table class="table">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $no=1;foreach($produk as $row) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nama_produk ?></td>
                                                <td><?= $row->nama_kategori ?></td>
                                                <td><?= $row->harga_produk ?></td>
                                                <td>
                                                  <a href="<?= base_url('admin/produk/edit/'.$row->id_produk) ?>" class="btn waves-effect waves-light btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                  <a href="<?= base_url('admin/produk/detail/'.$row->id_produk) ?>" class="btn waves-effect waves-light btn-primary"><i class="fas fa-th-list"></i></a>
                                                  <a onclick="deleteConfirm('<?= base_url('admin/produk/delete/'.$row->id_produk) ?>')" href="#"
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

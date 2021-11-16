
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Detail Produk</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="apparel.php" class="text-muted">Produk</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Detail Produk</li>
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
                                <form>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Kode Produk</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled value="<?= $produk->kode_produk ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Nama Produk</label>
                                            <input type="email" class="form-control" id="exampleInputPassword1" disabled value="<?= $produk->nama_produk ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Nama Kategori</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" disabled value="<?= $produk->nama_kategori ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Slug Produk</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" disabled value="<?= $produk->slug_produk ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Harga Produk</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" disabled value="<?= $produk->harga_produk ?>">
                                        </div>
                                        <a href="<?= base_url('admin/kategori') ?>" class="btn btn-danger">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Tabel Foto Produk</h4>
                                  <button type="button" class="btn btn-success" data-toggle="modal"
                                          data-target="#bs-example-modal-lg1"><i class="fas fa-plus-circle"></i>
                                  </button>
                                  <!--  Modal content for the above example -->
                                  <div class="modal fade" id="bs-example-modal-lg1" tabindex="-1" role="dialog"
                                      aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h4 class="modal-title" id="myLargeModalLabel">Tambah Foto Produk</h4>
                                                  <button type="button" class="close" data-dismiss="modal"
                                                      aria-hidden="true">×</button>
                                              </div>
                                              <div class="modal-body">
                                                  <form method="post" action="<?= base_url('admin/foto/add') ?>" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?= $produk->id_produk ?>">
                                                      <div class="mb-3">
                                                          <label for="exampleInputEmail1" class="form-label">Nama Foto</label>
                                                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">
                                                      </div>
                                                      <div class="mb-3">
                                                          <label for="exampleInputPassword1" class="form-label">File Foto</label>
                                                          <input type="file" class="form-control" id="exampleInputPassword1" name="foto">
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
                                                  <th>Foto</th>
                                                  <th>Aksi</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php $no=1;foreach($foto as $row) : ?>
                                              <tr>
                                                  <td><?= $no++ ?></td>
                                                  <td><?= $row->nama_foto ?></td>
                                                  <td>
                                                    <img src="<?= base_url() ?>assets/upload/produk/<?= $row->foto_produk ?>" alt="user" class=""
                                                        width="40">
                                                  </td>
                                                  <td>
                                                    <a href="<?= base_url('admin/foto/edit/'.$row->id_foto) ?>" class="btn waves-effect waves-light btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="<?= base_url('admin/foto/detail/'.$row->id_foto) ?>" class="btn waves-effect waves-light btn-primary"><i class="fas fa-th-list"></i></a>
                                                    <a onclick="deleteConfirm('<?= base_url('admin/foto/delete/'.$row->id_foto) ?>')" href="#"
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

                          <div class="col-lg-6">
                              <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">Tabel Detail Produk</h4>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#bs-example-modal-lg2"><i class="fas fa-plus-circle"></i>
                                    </button>
                                    <!--  Modal content for the above example -->
                                    <div class="modal fade" id="bs-example-modal-lg2" tabindex="-1" role="dialog"
                                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myLargeModalLabel">Tambah Detail Produk</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?= base_url('admin/produk/add_detail') ?>">
                                                      <input type="hidden" name="id" value="<?= $produk->id_produk ?>">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Ukuran Barang</label>
                                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="ukuran">
                                                                <option>--Pilih Ukuran--</option>
                                                              <?php foreach($ukuran as $row) : ?>
                                                                <option value="<?= $row->id_ukuran ?>"><?= $row->nama_ukuran ?></option>
                                                              <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputPassword1" class="form-label">Warna</label>
                                                            <input type="text" class="form-control" id="exampleInputPassword1" name="warna">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputPassword1" class="form-label">Stok Barang</label>
                                                            <input type="number" class="form-control" id="exampleInputPassword1" name="stok">
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
                                                    <th>Ukuran</th>
                                                    <th>Warna</th>
                                                    <th>Stok</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php $no=1;foreach($detail as $row) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $row->nama_ukuran ?></td>
                                                    <td><?= $row->warna ?></td>
                                                    <td><?= $row->stok ?></td>
                                                    <td>
                                                      <a href="<?= base_url('admin/produk/edit/'.$row->id_ukuran) ?>" class="btn waves-effect waves-light btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                      <a href="<?= base_url('admin/produk/detail/'.$row->id_ukuran) ?>" class="btn waves-effect waves-light btn-primary"><i class="fas fa-th-list"></i></a>
                                                      <a onclick="deleteConfirm('<?= base_url('admin/produk/delete/'.$row->id_ukuran) ?>')" href="#"
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

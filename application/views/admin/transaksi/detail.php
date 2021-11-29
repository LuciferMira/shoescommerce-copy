
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Detail Transaksi</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="text-muted">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/transaksi') ?>" class="text-muted">Transaksi</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Detail Transaksi</li>
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
                                            <label for="exampleInputEmail1" class="form-label">Kode Transaksi</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled value="<?= $transaksi->kode_transaksi ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Nama Pembeli</label>
                                            <input type="email" class="form-control" id="exampleInputPassword1" disabled value="<?= $transaksi->nama ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Alamat Kirim</label>
                                            <!-- <input type="date" class="form-control" id="exampleInputPassword1" disabled value="<?= $transaksi->alamat ?>"> -->
                                            <textarea name="alamat" rows="8" cols="80" class="form-control" readonly><?= $transaksi->alamat ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tanggal Transaksi</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" disabled value="<?= $transaksi->tanggal_transaksi ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Status Bayar</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" disabled value="<?= $transaksi->status ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tanggal Bayar</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" disabled value="<?= $transaksi->tanggal_bayar ?>">
                                        </div>
                                        <a href="<?= base_url('admin/transaksi') ?>" class="btn btn-danger">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Tabel Detail Transaksi</h4>
                                  <div class="table-responsive">
                                  <br>
                                      <table class="table">
                                          <thead class="bg-primary text-white">
                                              <tr>
                                                  <th>No</th>
                                                  <th>Nama Produk</th>
                                                  <th>Qty Beli</th>
                                                  <th>Harga Satuan</th>
                                                  <th>Subtotal</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php $no=1;foreach($detail as $row) : ?>
                                              <tr>
                                                  <td><?= $no++ ?></td>
                                                  <td><?= $row->nama_produk ?></td>
                                                  <td>
                                                    <?= $row->qty ?>
                                                  </td>
                                                  <td>
                                                    <?= $row->harga_satuan ?>
                                                  </td>
                                                  <td>
                                                    <?= $row->subtotal ?>
                                                  </td>
                                              </tr>
                                            <?php endforeach; ?>
                                          </tbody>
                                          <tfoot>
                                            <th colspan="4" class="text-right">Total Transaksi</th>
                                            <th><?= $transaksi->total_transaksi?></th>
                                          </tfoot>
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

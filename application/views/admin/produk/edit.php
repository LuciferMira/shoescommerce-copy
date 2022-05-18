
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Produk</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="apparel.php" class="text-muted">Produk</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Edit Produk</li>
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
                                <form method="post" action="<?= base_url('admin/produk/update') ?>">
                                        <div class="mb-3">
                                          <input type="hidden" name="user" value="<?= $datauser['id'] ?>">
                                            <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                                            <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly value="<?= $produk->id_produk ?>" name="id">
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $produk->nama_produk ?>" name="nama">
                                        </div>
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Kategori Produk</label>
                                          <select class="form-control" name="kategori">
                                            <option value="<?= $produk->id_kategori ?>"><?= $produk->nama_kategori ?></option>
                                            <?php foreach ($kategori as $row) {
                                                if($row->id_kategori==$produk->id_kategori){
                                                  continue;
                                                } ?>
                                            <option value="<?= $row->id_kategori ?>"><?= $row->nama_kategori ?></option>
                                            <?php }?>
                                          </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Harga Produk</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $produk->harga_produk ?>" name="harga">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="deskripsi"><?= $produk->deskripsi ?></textarea>
                                        </div>
                                        <button type="submit" name="button" class="btn btn-success">Simpan</button>
                                        <a href="<?= base_url('admin/produk') ?>" class="btn btn-danger">Kembali</a>
                                    </div>
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

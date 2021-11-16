
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Detail Kategori</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="apparel.php" class="text-muted">Kategori</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Detail Kategori</li>
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
                                <form method="post" action="<?= base_url('admin/kategori/update') ?>">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                                            <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly value="<?= $kategori->id_kategori ?>" name="id">
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $kategori->nama_kategori ?>" name="nama">
                                        </div>
                                        <button type="submit" name="button" class="btn btn-success">Simpan</button>
                                        <a href="<?= base_url('admin/kategori') ?>" class="btn btn-danger">Kembali</a>
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


<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Detail Ukuran</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="apparel.php" class="text-muted">Ukuran</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Detail Ukuran</li>
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
                                <form method="post" action="<?= base_url('admin/ukuran/update') ?>">
                                        <!-- <div class="mb-3"> -->
                                            <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly value="<?= $ukuran->id_ukuran ?>" name="id">
                                            <div class="form-group mb-4">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">Kategori</label>
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="kategori">
                                                    <option value="<?= $ukuran->id_kategori ?>"><?= $ukuran->nama_kategori ?></option>
                                                  <?php foreach($kategori as $row) : ?>
                                                    <?php if($row->id_kategori == $ukuran->id_kategori){ continue; }else{ ?>
                                                    <option value="<?= $row->id_kategori ?>"><?= $row->nama_kategori ?></option>
                                                  <?php } endforeach; ?>
                                                </select>
                                            </div>
                                        <!-- </div> -->
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Ukuran</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $ukuran->nama_ukuran ?>" name="nama">
                                        </div>
                                        <button type="submit" name="button" class="btn btn-success">Simpan</button>
                                        <a href="<?= base_url('admin/ukuran') ?>" class="btn btn-danger">Kembali</a>
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

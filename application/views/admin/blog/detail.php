
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Detail Blog</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="text-muted">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/blog') ?>" class="text-muted">Blog</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Detail Blog</li>
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
                                            <label for="exampleInputEmail1" class="form-label">Judul Blog</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled value="<?= $blog->judul_blog ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Isi Blog</label>
                                            <textarea name="isi" rows="8" cols="80" disabled class="form-control"><?= $blog->isi_blog ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Gambar Blog</label>
                                            <img src="<?= base_url() ?>assets/upload/blog/<?= $blog->gambar_blog ?>" alt="user" width="400" class="img-responsive">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Uploader</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled value="<?= $blog->nama ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tanggal Dibuat</label>
                                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled value="<?= $blog->tanggal_dibuat ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tanggal Diubah</label>
                                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled value="<?= $blog->tanggal_diubah ?>">
                                        </div>
                                        <a href="<?= base_url('admin/blog') ?>" class="btn btn-danger">Kembali</a>
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

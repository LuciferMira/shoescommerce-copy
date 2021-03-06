<br><br><br>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="blog.html" class="stext-109 cl8 hov-cl1 trans-04">
				Blog
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?= $blog->judul_blog ?>
			</span>
		</div>
	</div>


	<!-- Content page -->
	<section class="bg0 p-t-52 p-b-20">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 p-b-80">
					<div class="p-r-45 p-r-0-lg">
						<!--  List Blog-->
						<div class="wrap-pic-w how-pos5-parent">
							<img src="<?= base_url() ?>assets/upload/blog/<?= $blog->gambar_blog ?>" alt="IMG-BLOG">

							<div class="flex-col-c-m size-123 bg9 how-pos5">
								<span class="ltext-107 cl2 txt-center">
									<?= date('d', strtotime($blog->tanggal_dibuat)) ?>
								</span>

								<span class="stext-109 cl3 txt-center">
									<?= date('M', strtotime($blog->tanggal_dibuat))." ".date('Y', strtotime($blog->tanggal_dibuat)) ?>
								</span>
							</div>
						</div>

						<div class="p-t-32">
							<span class="flex-w flex-m stext-111 cl2 p-b-19">
								<span>
									<span class="cl4">By </span> </span> <?= " ".$blog->nama ?>
									<!-- <span class="cl12 m-l-4 m-r-6">|</span> -->
								</span>

								<span>
									<?= date('d', strtotime($blog->tanggal_dibuat))." ".date('M', strtotime($blog->tanggal_dibuat)) ?>, <?= date('Y', strtotime($blog->tanggal_dibuat)) ?>
									<!-- <span class="cl12 m-l-4 m-r-6">|</span> -->
								</span>

								<!-- <span>
									8 Comments
								</span> -->
							</span>

							<h4 class="ltext-109 cl2 p-b-28">
								<?= $blog->judul_blog ?>
							</h4>

							<p class="stext-117 cl6 p-b-26">
								<?= $blog->isi_blog ?>
							</p>
						</div>


						<!--  -->
						<div class="p-t-40">
							<?php if($this->session->userdata('nama') != NULL):?>
							<h5 class="mtext-113 cl2 p-b-12">
								Leave a Comment
							</h5>

							<form>
								<div class="bor19 m-b-20">
									<textarea class="stext-111 cl2 plh3 size-124 p-lr-18 p-tb-15" name="cmt" placeholder="Comment..."></textarea>
								</div>

								<button class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04">
									Post Comment
								</button>
							</form>
							<?php else: ?>
								<a href="<?= base_url("login") ?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
									Login Terlebih Dahulu
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<!-- <div class="col-md-4 col-lg-3 p-b-80">
					<div class="side-menu">
						<div class="bor17 of-hidden pos-relative">
							<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

							<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
								<i class="zmdi zmdi-search"></i>
							</button>
						</div>

						<div class="p-t-55">
							<h4 class="mtext-112 cl2 p-b-33">
								Categories
							</h4>

							<ul>
								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Fashion
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Beauty
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Street Style
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Life Style
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										DIY & Crafts
									</a>
								</li>
							</ul>
						</div>

						<div class="p-t-65">
							<h4 class="mtext-112 cl2 p-b-33">
								Featured Products
							</h4>

							<ul>
								<li class="flex-w flex-t p-b-30">
									<a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
										<img src="assets/images/product-min-01.jpg" alt="PRODUCT">
									</a>

									<div class="size-215 flex-col-t p-t-8">
										<a href="#" class="stext-116 cl8 hov-cl1 trans-04">
											White Shirt With Pleat Detail Back
										</a>

										<span class="stext-116 cl6 p-t-20">
											$19.00
										</span>
									</div>
								</li>

							</ul>
						</div>


					</div>
				</div> -->
			</div>
		</div>
	</section>


<br><br><br>
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">

			<div class="row isotope-grid">
				<?php foreach($produk as $row) : ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item" style="width:45%;">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<?php if($row->foto_produk!=NULL){ ?>
								<img src="<?= base_url() ?>assets/upload/produk/<?= $row->foto_produk ?>" alt="IMG-PRODUCT">
							<?php }else{ ?>
								<img src="<?= base_url() ?>assets/upload/produk/default.png" alt="IMG-PRODUCT">
							<?php } ?>

							<a href="<?= base_url('produk/detail/') ?><?= $row->slug_produk ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<?= base_url('produk/detail/') ?><?= $row->slug_produk ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?= $row->nama_produk ?>
								</a>

								<span class="stext-105 cl3">
									Rp. <?= number_format($row->harga_produk) ?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<!-- <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="assets/images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="assets/images/icons/icon-heart-02.png" alt="ICON">
								</a> -->
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>


			<!-- Load more -->
			<!-- <div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div> -->
		</div>
	</div>

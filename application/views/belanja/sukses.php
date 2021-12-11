<br><br>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>


	<!-- Shoping Cart -->
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Nama Produk</th>
									<th class="column-2"></th>
									<th class="column-3">Harga</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Subtotal</th>
									<th class="column-6">Aksi</th>
								</tr>

								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<!-- <img src="<?= base_url() ?>assets/upload/produk/<?= $cart['foto']?>" alt="IMG"> -->
										</div>
									</td>
									<td class="column-2">awdadawda</td>
									<td class="column-3">akdbawd</td>
									<td class="column-4">
										<form action="" method="post">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5">Rp. akjdbawdjawd</td>
									<td class="column-6">
										<a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
										<button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></button>
								  </td>
								</tr>
							</form>
							</table>
						</div>
						<br>
						<a href="" class="btn btn-danger">Hapus Keranjang</a>

					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Total Belanja
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Total:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									Rp. 
								</span>
							</div>
						</div>



							<?php if($this->session->userdata('status') != 'login'):?>
								<a href="<?= base_url("login") ?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
									Login Terlebih Dahulu
								</a>
							<?php else: ?>
								<a href="<?= base_url("belanja") ?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
									Proceed to Checkout
								</a>
							<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

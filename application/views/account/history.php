<br><br>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?= base_url() ?>" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				History Transaksi
			</span>
		</div>
	</div>


	<!-- Shoping Cart -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Kode Transaksi</th>
									<th class="column-4">Total Transaksi</th>
									<th class="column-5">Status</th>
									<th class="column-6">Tanggal Transaksi</th>
									<th class="column-7">Aksi</th>
								</tr>

								<?php $no = 1; foreach($transaksi as $row) :?>
								<tr class="table_row">
									<td class="column-1"><?= $row->kode_transaksi ?></td>
									<td class="column-4"><?= $row->total_transaksi ?></td>
									<td class="column-5"><?= $row->status ?></td>
									<td class="column-6"><?= $row->tanggal_transaksi ?></td>
									<td class="column-7">
										<!-- <a href="<?= base_url('cart/hapus/') ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a> -->
										<button type="submit" class="btn btn-primary"><i class="fa fa-eye"></i></button>
								  </td>
								</tr>
							<?php endforeach; ?>
							</table>
						</div>
						<br>

					</div>
				</div>

			</div>
		</div>

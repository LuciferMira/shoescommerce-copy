<br><br><br>
	<!-- Title page -->
	<!-- <section class="bg-img1 txt-center p-lr-15 p-tb-92" style=" background-image: url('assets/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Contact
		</h2>
	</section> -->


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="<?= base_url('login/update_pass')?>" method="post">
						<input type="hidden" name="id" value="<?= $datauser['id']?>">
						<div class="size-212 p-t-2" style="margin-bottom: 3%;">
							<span class="mtext-110 cl2">
								Password Lama
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								<input class="form-control" type="password" name="old_pass">
							</p>
						</div>
						<div class="size-212 p-t-2" style="margin-bottom: 3%;">
							<span class="mtext-110 cl2">
								Password Baru
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								<input class="form-control" type="password" name="new_pass">
							</p>
						</div>
						<div class="size-212 p-t-2" style="margin-bottom: 3%;">
							<span class="mtext-110 cl2">
								Confirmasi Password
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								<input class="form-control" type="password" name="conf_pass">
							</p>
						</div>

						<!-- <a href="<?= base_url('contact/return') ?>" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Change Password
						</a> -->
						<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Change Password
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<form action="<?= base_url('login/update')?>" method="post">
						<input type="hidden" name="id" value="<?= $datauser['id']?>">
						<div class="size-212 p-t-2" style="margin-bottom: 3%;">
							<span class="mtext-110 cl2">
								Nama
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								<input class="form-control" type="text" name="nama" value="<?= $datauser['nama']?>">
							</p>
						</div>
						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Email
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								<input class="form-control" type="email" name="email" value="<?= $datauser['email']?>" readonly>
							</p>
						</div>
						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Tanggal Lahir
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								<input class="form-control" type="date" name="tgl_lahir" value="<?= $datauser['tanggal_lahir']?>">
							</p>
						</div>
						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Tempat Lahir
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								<input class="form-control" type="text" name="tmpt_lahir" value="<?= $datauser['tempat_lahir']?>">
							</p>
						</div>
						<div class="size-212 p-t-2" style="margin-bottom: 3%;">
							<span class="mtext-110 cl2">
								Telepon
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								<input class="form-control" type="text" name="telp" value="<?= $datauser['telepon']?>">
							</p>
						</div>
						<div class="size-212 p-t-2" style="margin-bottom: 3%;">
							<span class="mtext-110 cl2">
								Alamat
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								<textarea class="form-control" name="alamat" rows="8" cols="80"><?= $datauser['alamat']?></textarea>
							</p>
						</div>
					<br><br>
					<!-- <a href="<?= base_url('contact/return') ?>" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
						Edit Profile
					</a> -->
					<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="btn_update">Edit Profile</button>
				</div>
			</div>
		</div>
	</section>


	<!-- Map -->
	<div class="map">
		<div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="assets/images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
	</div>

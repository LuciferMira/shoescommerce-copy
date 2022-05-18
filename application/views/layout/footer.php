
	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						&copy Shoescommerce <?= date('Y') ?>
					</h4>
				</div>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="<?= base_url(); ?>assets/images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="<?= base_url(); ?>assets/images/product-detail-01.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-02.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="<?= base_url(); ?>assets/images/product-detail-02.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="<?= base_url(); ?>assets/images/product-detail-03.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								Lightweight Jacket
							</h4>

							<span class="mtext-106 cl2">
								$58.79
							</span>

							<p class="stext-102 cl3 p-t-23">
								Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
							</p>

							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Size S</option>
												<option>Size M</option>
												<option>Size L</option>
												<option>Size XL</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Red</option>
												<option>Blue</option>
												<option>White</option>
												<option>Grey</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script>
		$('#id_ukuran').change(function(){
	    let ukuran = $('#ukuran').val($("#id_ukuran option:selected").text())
			let warna = $('#warna').val()
			if(warna==""){
				console.log('Pilih Warna Terlebih Dahulu');
			}else if(ukuran==""){
				console.log('Pilih Ukuran Terlebih Dahulu');
			}else{
				getStok()
			}
		})
		 // $("#id_ukuran option:selected").text();
		$('#id_detail').change(function(){
	    let warna = $('#warna').val($("#id_detail option:selected").text())
			let ukuran = $('#ukuran').val()
			if(warna==""){
				console.log('Pilih Warna Terlebih Dahulu');
			}else if(ukuran==""){
				console.log('Pilih Ukuran Terlebih Dahulu');
			}else{
				getStok()
			}
		})

		function getStok()
		{
			var idukuran = $('#id_ukuran').val()
			var warna = $('#warna').val()

			// alert(idukuran+'-'+warna)
			$.ajax({
				url: "<?= base_url();?>index.php/produk/cek_stok",
				type: 'post',
				data: {idukuran: idukuran,warna: warna},
				dataType: 'json',
				cache: false,
				success:function(data){
					if(data==null){
						$('#stok').val(0);
					}else{
						$('#stok').val(data.stok);
					}
				},
				error:function(data){

				}
			})
		}

		 // $("#id_ukuran option:selected").text();
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/slick/slick.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

	</script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/js/main.js"></script>
	
	<!-- script api raja ongkir -->
	<script>
		document.getElementById('provinsi_tujuan').addEventListener('change', function(){
			fetch("<?= base_url('belanja/kota/')?>"+this.value,{
				method:'GET',
			})
			.then((response)=>response.text())
			.then((data)=>{
				document.getElementById('kota_tujuan').innerHTML = data
			})
		})
		document.getElementById('kurir-pilihan').addEventListener('change', function(){
			var jumlah_transaksi = parseFloat($('#jumlah_transaksi').val())
			var ongkir = parseFloat(this.value)
			var total_bayar = parseFloat(jumlah_transaksi + ongkir)
			$('#total_bayar').text((total_bayar).toLocaleString('id', { style: 'currency', currency: 'IDR' }))
			$('#total_transaksi').val(total_bayar)
		})
		function getservice()
		{
			//ambil data dari belanja/checkout
			var origin			= $('#kota_asal').val()//7
			var destination 	= $('#kota_tujuan').find(":selected").val()//17
			var weight 			= $('#berat').val()
			var courier 		= $("#kurir").find(":selected").val()
			//pakai ajax untuk request data daftar ekspedisi yang tersedia dan ongkirnya
			$.ajax({
				//request ke controller belanja/getservice
                url: '<?= base_url() ?>belanja/getservice',
				//method POST
                type: 'POST',
				//return data atau respond data dalam json
				dataType: 'json',
                cache: false,
				//data yang dikirim ke controller
                data: {
					origin		: origin,
					destination : destination,
					weight		: weight,
					courier 	: courier
				},
				//jika request berhasil
				success: function(response) {
					$(".service").empty()
					var data = response
					var status = data.rajaongkir.status.code
					//status 200 artinya Response sukses
					if(status == 200)
					{
						//menampilkan data yg direturn
						var baris =''
						for(var i = 0; i< data.rajaongkir.results[0].costs.length ; i++){
							baris = '<td>'
							baris += '<div class="card">'
							//menampilkan nama ekspedisi
							baris += '<h5 class="card-title">'+data.rajaongkir.results[0].costs[i].service+'</h5>'
							baris += '<div class="card-body">'
							//menampilkan deskripsi ekspedisi
							baris += '<p class="card-text">'+data.rajaongkir.results[0].costs[i].description+'</p>'
							//menampilkan ongkir masing-masing ekspedisi berdasarkan kota-asal, kota-tujuan, berat barang (dalam gram)
							baris += '<p class="card-text"> '+(data.rajaongkir.results[0].costs[i].cost[0].value).toLocaleString('id', { style: 'currency', currency: 'IDR' })+'</p>'
							//menampilkan estimasi lama pengiriman
							baris += '<p class="card-text">Estimasi pengiriman : '+data.rajaongkir.results[0].costs[i].cost[0].etd+' hari</p>'
							baris += '</div>'
							baris += '</div>'
							baris += '</td>'
						}
						//append element
						$(".service").append(baris);
						var row = '<option value=""> Pilih Servis</option>'
						for(var i = 0; i< data.rajaongkir.results[0].costs.length ; i++){
							row += '<option value="'+(data.rajaongkir.results[0].costs[i].cost[0].value)+'">'+data.rajaongkir.results[0].costs[i].service+' / '+(data.rajaongkir.results[0].costs[i].cost[0].value).toLocaleString('id', { style: 'currency', currency: 'IDR' })+'</option>'
						}
						document.getElementById('kurir-pilihan').innerHTML = row

					}
					//jika Response gagal
					else{
						$(".service").empty()
						$(".service").append('<td colspan="6" style="text-align: center;">Tidak ada data</td>');
					}
                },
                error: function(data) {
                    alert("Gagal mengambil data");
                }
			})
		}
	</script>
	<!-- end script api raja ongkir -->

</body>
</html>

<?php
//load slider.php
include 'slider.php';
//load kategori.php
include 'kategori.php';
//load produk.php
include 'produk.php';
//load berita.php
include 'berita.php';
?>

<!-- Banner2 -->
<!-- <section class="banner2 bg5 p-t-55 p-b-55">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
				<div class="hov-img-zoom pos-relative">
					<img src="<?= base_url(); ?>assets/template/images/banner-08.jpg" alt="IMG-BANNER">

					<div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
						<span class="m-text9 p-t-45 fs-20-sm">
							The Beauty
						</span>

						<h3 class="l-text1 fs-35-sm">
							Lookbook
						</h3>

						<a href="#" class="s-text4 hov2 p-t-20 ">
							View Collection
						</a>
					</div>
				</div>
			</div>

			<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
				<div class="bgwhite hov-img-zoom pos-relative p-b-20per-ssm">
					<img src="<?= base_url(); ?>assets/template/images/shop-item-09.jpg" alt="IMG-BANNER">

					<div class="ab-t-l sizefull flex-col-c-b p-l-15 p-r-15 p-b-20">
						<div class="t-center">
							<a href="product-detail.html" class="dis-block s-text3 p-b-5">
								Gafas sol Hawkers one
							</a>

							<span class="block2-oldprice m-text7 p-r-5">
								$29.50
							</span>

							<span class="block2-newprice m-text8">
								$15.90
							</span>
						</div>

						<div class="flex-c-m p-t-44 p-t-30-xl">
							<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
								<span class="m-text10 p-b-1 days">
									69
								</span>

								<span class="s-text5">
									days
								</span>
							</div>

							<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
								<span class="m-text10 p-b-1 hours">
									04
								</span>

								<span class="s-text5">
									hrs
								</span>
							</div>

							<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
								<span class="m-text10 p-b-1 minutes">
									32
								</span>

								<span class="s-text5">
									mins
								</span>
							</div>

							<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
								<span class="m-text10 p-b-1 seconds">
									05
								</span>

								<span class="s-text5">
									secs
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->


	

<style>
/*[ Block4 ]
///////////////////////////////////////////////////////////
*/
.block4 {
  position: relative;
  overflow: hidden;
  width: calc(100% / 5);
}

@media (max-width: 1360px) {
  .block4 {
    width: calc(100% / 4);
  }
}

@media (max-width: 1200px) {
  .block4 {
    width: calc(100% / 3);
  }
}

@media (max-width: 992px) {
  .block4 {
    width: calc(100% / 2);
  }
}

@media (max-width: 576px) {
  .block4 {
    width: calc(100% / 1);
  }
}

/* ------------------------------------ */
@media (max-width: 1660px) {
  .rs1-block4 .block4 {
    width: calc(100% / 4);
  }
}

@media (max-width: 1380px) {
  .rs1-block4 .block4 {
    width: calc(100% / 3);
  }
}

@media (max-width: 1200px) {
  .rs1-block4 .block4 {
    width: calc(100% / 2);
  }
}

@media (max-width: 576px) {
  .rs1-block4 .block4 {
    width: calc(100% / 1);
  }
}

/* ------------------------------------ */
.block4-overlay {
  display: block;
  background-color: rgba(0,0,0,0.9);
  visibility: hidden;
  opacity: 0;
}

.block4-overlay:hover {
  color: unset;
}

/* ------------------------------------ */
.block4-overlay-txt {
  position: absolute;
  width: 100%;
  left: 0;
  bottom: -100%;
}

/* ------------------------------------ */
.block4-overlay-heart {
  transform-origin: top left;
  -webkit-transform: scale(0);
  -moz-transform: scale(0);
  -ms-transform: scale(0);
  -o-transform: scale(0);
  transform: scale(0);
}

/* ------------------------------------ */
.block4:hover .block4-overlay {
  visibility: visible;
  opacity: 1;
}

.block4:hover .block4-overlay-txt {
  bottom: 0;
}

.block4:hover .block4-overlay-heart {
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}
</style>

<!-- Instagram -->
<!-- <section class="instagram p-t-20">
	<div class="sec-title p-b-52 p-l-15 p-r-15">
		<h3 class="m-text5 t-center">
			@ follow us on Instagram
		</h3>
	</div>

	<div class="flex-w">
		<!-- Block4 -->
		<!-- <div class="block4 wrap-pic-w">
			<img src="assets\template\images\gallery-003.jpg" alt="IMG-INSTAGRAM">

			<a href="" class="block4-overlay sizefull ab-t-l trans-0-4">
				<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
					<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
					<span class="p-t-2">39</span>
				</span>

				<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
					<p class="s-text10 m-b-15 h-size1 of-hidden">
						Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
					</p>

					<span class="s-text9">
						Photo by @nancyward
					</span>
				</div>
			</a>
		</div>

		<!-- Block4 -->
		<!-- <div class="block4 wrap-pic-w">
			<img src="assets\template\images\gallery-005.jpg" alt="IMG-INSTAGRAM">

			<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
				<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
					<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
					<span class="p-t-2">39</span>
				</span>

				<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
					<p class="s-text10 m-b-15 h-size1 of-hidden">
						Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
					</p>

					<span class="s-text9">
						Photo by @nancyward
					</span>
				</div>
			</a>
		</div> -->

		<!-- Block4 -->
		<!-- <div class="block4 wrap-pic-w">
			<img src="assets\template\images\gallery-007.jpg" alt="IMG-INSTAGRAM">

			<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
				<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
					<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
					<span class="p-t-2">39</span>
				</span>

				<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
					<p class="s-text10 m-b-15 h-size1 of-hidden">
						Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
					</p>

					<span class="s-text9">
						Photo by @nancyward
					</span>
				</div>
			</a>
		</div> -->

		<!-- Block4 -->
		<!-- <div class="block4 wrap-pic-w">
			<img src="assets\template\images\gallery-009.jpg" alt="IMG-INSTAGRAM">

			<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
				<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
					<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
					<span class="p-t-2">39</span>
				</span>

				<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
					<p class="s-text10 m-b-15 h-size1 of-hidden">
						Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
					</p>

					<span class="s-text9">
						Photo by @nancyward
					</span>
				</div>
			</a>
		</div> -->

		<!-- Block4 -->
		<!-- <div class="block4 wrap-pic-w">
			<img src="assets\template\images\gallery-011.jpg" alt="IMG-INSTAGRAM">

			<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
				<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
					<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
					<span class="p-t-2">39</span>
				</span>

				<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
					<p class="s-text10 m-b-15 h-size1 of-hidden">
						Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
					</p>

					<span class="s-text9">
						Photo by @nancyward
					</span>
				</div>
			</a>
		</div> -->
	<!-- </div> -->
<!-- </section> -->

<!-- Shipping -->
<!-- <section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Free Delivery Worldwide
				</h4>

				<a href="#" class="s-text11 t-center">
					Click here for more info
				</a>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					30 Days Return
				</h4>

				<span class="s-text11 t-center">
					Simply return it within 30 days for an exchange.
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Store Opening
				</h4>

				<span class="s-text11 t-center">
					Shop open from Monday to Sunday
				</span>
			</div>
		</div>
</section>	 -->
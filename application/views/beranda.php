<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>
		<?= $judul ?>
	</title>

	<!-- Google font -->
	<link href="<?= base_url('assets/electro/') ?>https://fonts.googleapis.com/css?family=Montserrat:400,500,700"
		rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/electro/') ?>css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/electro/') ?>css/slick.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/electro/') ?>css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/electro/') ?>css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="<?= base_url('assets/electro/') ?>css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/electro/') ?>css/style.css" />

	<!-- Custom favicon -->
	<link rel="icon" type="image/png" href="<?= base_url('assets/electro/') ?>./img/logoicon.png">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="https://wa.me/<?= $konfig->no_wa; ?>"><i class="fa fa-whatsapp"></i>
						</a></li>
					<li><a href=<?= $konfig->instagram; ?>><i class="fa fa-instagram"></i>
						</a></li>
					<li><a href=<?= $konfig->youtube; ?>><i class="fa fa-youtube"></i>
						</a></li>
					<li><a href="<?= $konfig->alamat; ?>"><i class="fa fa-map-marker"></i>
						</a></li>
				</ul>
				<ul class="header-links pull-right">
					<li><a href="<?= base_url('auth') ?>"><i class="fa fa-user-o"></i>Account</a></li>
				</ul>
			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header">
							<a href="#">
								<img src="<?= base_url('assets/electro/') ?>./img/logo.png" alt="500" width="169"
									height="70">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<style>
						.col-md-6 {
							display: flex;
							justify-content: center;
							align-items: center;
						}

						.header-search {
							text-align: center;
							/* Untuk memastikan bahwa elemen dalam .header-search berada di tengah */
						}
					</style>

					<div class="col-md-6">
						<div class="header-search">
							<form action="<?= base_url('home/cari/') ?>" method="post">
								<input name="ketik" type="text" id="search-input" class="input-select"
									placeholder="Search here">
								<button class="search-btn"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->


					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->


	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<li class="active"><a href="<?= base_url() ?>">Home</a></li>
					<?php
					$menu = $this->uri->segment(3);
					foreach ($kategori as $kate) { ?>
						<li class="<?php if ($menu == $kate['id_kategori']) {
							echo "active";
						} ?>">
							<a href="<?= base_url('home/kategori/' . $kate['id_kategori']) ?>">
								<?= $kate['nama_kategori'] ?>
							</a>
						</li>
					<?php } ?>
				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->


	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- shop -->
			<?php foreach ($kategori as $kate) { ?>
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="<?= base_url('assets/upload/kategori/' . $kate['foto_kategori']) ?>" alt="">
						</div>
						<div class="shop-body">
							<h3>
								<?= strtoupper($kate['nama_kategori']) ?><br>
							</h3>
							<a href="<?= base_url('home/kategori/' . $kate['id_kategori']) ?>" class="cta-btn">Shop now
								<i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
			<?php } ?>
			<!-- /shop -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->


	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Products</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li><a>
										<a href="<?= base_url('home/produk/') ?>">
											More...
										</a>
									</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1">
									<?php foreach ($konten as $uu) { ?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="<?= base_url('assets/upload/konten/' . $uu['foto']) ?>" style="width: 264px; height: 130px;">
											</div>
											<div class="product-body">
												<p class="product-category">
													<?= $uu['nama_kategori'] ?>
												</p>
												<h3 class="product-name">
													<?= $uu['judul'] ?>
												</h3>
												<h4 class="product-price">
													<?= $uu['harga'] ?> <del></del>
												</h4>
											</div>
											<div class="add-to-cart"><a
													href="<?= base_url('home/artikel/' . $uu['slug']) ?>">
													<button class="add-to-cart-btn"><i
															class="fa fa-exchange"></i>Detail</button></a>
											</div>
										</div>
									<?php } ?>
									<!-- /product -->
								</div>
								<div id="slick-nav-1" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- HOT DEAL SECTION -->

	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner">
						<?php $no = 1;
						foreach ($caraousel as $aa) { ?>
							<div class="carousel-item <?php if ($no == 1) {
								echo 'active';
							} ?>">
								<img class="carousel-inner" src="<?= base_url('assets/upload/caraousel/' . $aa['foto']) ?>"
									alt="Image">
							</div>
							<?php $no++;
						} ?>
					</div>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->

	<br>
	<br>

	<!-- FOOTER -->
	<footer id="footer">
		<!-- top footer -->
		<div class="section">
			<!-- container -->
			<div class="container text-center">
				<!-- row -->
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">About Us</h3>
							<p>
								<?= $konfig->profil_website; ?>
							</p>
							<br>

						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Categories</h3>
							<ul class="footer-links">
								<?php foreach ($kategori as $kate) { ?>
									<li><a href="<?= base_url('home/kategori/' . $kate['id_kategori']) ?>">
											<?= $kate['nama_kategori'] ?>
										</a></li>
								<?php } ?>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Social Media</h3>
							<ul class="footer-links">
								<li><a href="<?= $konfig->instagram; ?>"><i class="fa fa-instagram"></i>
										Instagram
									</a></li>
								<li><a href="<?= $konfig->facebook; ?>"><i class="fa fa-facebook"></i>
										Facebook
									</a></li>
								<li><a href="<?= $konfig->youtube; ?>"><i class="fa fa-youtube"></i>
										Youtube
									</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">

							<ul class="footer-links">
								<li><img src="<?= base_url('assets/electro/') ?>./img/foter.png" alt="500" width="200"
										height="150"></i>
							</ul>
						</div>
					</div>

					<div class="clearfix visible-xs"></div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /top footer -->

		<!-- bottom footer -->
		<div id="bottom-footer" class="section">
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12 text-center">
						<ul class="footer-payments">
							<li<i class="fa fa-cc-visa"></i></li>
								<li<i class="fa fa-credit-card"></i></li>
									<li<i class="fa fa-cc-paypal"></i></li>
										<li<i class="fa fa-cc-mastercard"></i>
											</li>
											<li<i class="fa fa-cc-discover"></i></li>
												<li<i class="fa fa-cc-amex"></i></li>
						</ul>
						<span class="copyright">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;
							<script>document.write(new Date().getFullYear());</script> Asampedia
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</span>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bottom footer -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="<?= base_url('assets/electro/') ?>js/jquery.min.js"></script>
	<script src="<?= base_url('assets/electro/') ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/electro/') ?>js/slick.min.js"></script>
	<script src="<?= base_url('assets/electro/') ?>js/nouislider.min.js"></script>
	<script src="<?= base_url('assets/electro/') ?>js/jquery.zoom.min.js"></script>
	<script src="<?= base_url('assets/electro/') ?>js/main.js"></script>

</body>

</html>
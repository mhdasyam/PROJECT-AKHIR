<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Website | Admin </title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/stisla/dist/') ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/stisla/dist/') ?>assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/stisla/dist/') ?>assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet"
        href="<?= base_url('assets/stisla/dist/') ?>assets/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet"
        href="<?= base_url('assets/stisla/dist/') ?>assets/modules/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/stisla/dist/') ?>assets/modules/summernote/summernote-bs4.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/stisla/dist/') ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/stisla/dist/') ?>assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>



<!-- NAVBAR START -->

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250">
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url('assets/stisla/dist/') ?>assets/img/avatar/avatar-1.png"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">
                                <?= $this->session->userdata('nama') ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item has-icon">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <img src="<?= base_url('assets/stisla/dist/') ?>assets/img/avatar/logo2.png" width="169"
									height="70">
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">MENU</li>
                        <?php $menu = $this->uri->segment(2); ?>
                        <?php $userLevel = $this->session->userdata('level'); ?>

                        <?php if ($userLevel == 'User'): ?>
                            <li class="<?php if ($menu == 'kategori') {
                                echo 'active';
                            } ?>">
                                <a href="<?= base_url('admin/kategori/') ?>" class="nav-link"><i
                                        class="far fa-file-alt"></i> <span>Kategori</span></a>
                            </li>
                            <li class="<?php if ($menu == 'konten') {
                                echo 'active';
                            } ?>">
                                <a href="<?= base_url('admin/konten/') ?>" class="nav-link"><i
                                        class="fas fa-map-marker-alt"></i> <span>Konten</span></a>
                            </li>
                        <?php elseif ($userLevel == 'Admin'): ?>
                            <li class="<?php if ($menu == 'home') {
                                echo 'active';
                            } ?>">
                                <a href="<?= base_url('admin/home/') ?>" class="nav-link"><i
                                        class="fas fa-fire"></i><span>Dashboard</span></a>
                            </li>
                            <li class="<?php if ($menu == 'pengguna') {
                                echo 'active';
                            } ?>">
                                <a href="<?= base_url('admin/pengguna/') ?>" class="nav-link"><i
                                        class="fas fa-columns"></i><span>Pengguna</span></a>
                            </li>
                            <li class="<?php if ($menu == 'konfigurasi') {
                                echo 'active';
                            } ?>">
                                <a href="<?= base_url('admin/konfigurasi/') ?>" class="nav-link"><i
                                        class="fas fa-th-large"></i> <span>Konfigurasi</span></a>
                            </li>
                            <li class="<?php if ($menu == 'caraousel') {
                                echo 'active';
                            } ?>">
                                <a href="<?= base_url('admin/caraousel/') ?>" class="nav-link"><i class="fas fa-th"></i>
                                    <span>Caraousel</span></a>
                            </li>
                            <li class="<?php if ($menu == 'kategori') {
                                echo 'active';
                            } ?>">
                                <a href="<?= base_url('admin/kategori/') ?>" class="nav-link"><i
                                        class="far fa-file-alt"></i> <span>Kategori</span></a>
                            </li>
                            <li class="<?php if ($menu == 'konten') {
                                echo 'active';
                            } ?>">
                                <a href="<?= base_url('admin/konten/') ?>" class="nav-link"><i
                                        class="fas fa-map-marker-alt"></i> <span>Konten</span></a>
                            </li>
                        <?php endif; ?>
                    </ul>

                 
                </aside>
            </div>
            <!-- NAVBAR END -->


            <!-- Main Content -->
            <div class="main-content">
                <div class="row">
                    <div class="col-12">
                        <section class="section">
                            <div id='myalert'>
                                <?= $this->session->flashdata('alert', true) ?>
                            </div>
                            <div class="section-header">

                                <?php echo $contents; ?>

                            </div>
                    </div>
                </div>
                </section>
            </div>



            <!-- FOOTER START -->
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhammad
                        Asyam</a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
            <!-- FOOTER END -->


        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/jquery.min.js"></script>
    <script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/popper.js"></script>
    <script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/tooltip.js"></script>
    <script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/moment.min.js"></script>
    <script src="<?= base_url('assets/stisla/dist/') ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script
        src="<?= base_url('assets/stisla/dist/') ?>assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/chart.min.js"></script>
    <script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/summernote/summernote-bs4.js"></script>
    <script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url('assets/stisla/dist/') ?>assets/js/page/index-0.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url('assets/stisla/dist/') ?>assets/js/scripts.js"></script>
    <script src="<?= base_url('assets/stisla/dist/') ?>assets/js/custom.js"></script>
    <script>
        $('#myalert').delay('slow').slideDown('slow').delay(4000).slideUp(600);
    </script>
</body>

</html>
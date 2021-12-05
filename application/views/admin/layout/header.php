<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Dashboard | Minia - Minimal Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/assets/images/logo-sm.jpeg">

        <!-- plugin css -->
        <link href="<?php echo base_url(); ?>assets/admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- Sweet Alert-->
        <link href="<?php echo base_url(); ?>assets/admin/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <!-- preloader css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/css/preloader.min.css" type="text/css" />
    
        <link href="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url(); ?>assets/admin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url(); ?>assets/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

        
        <!-- color picker css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/libs/@simonwep/pickr/themes/classic.min.css"/> <!-- 'classic' theme -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/libs/@simonwep/pickr/themes/monolith.min.css"/> <!-- 'monolith' theme -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/libs/@simonwep/pickr/themes/nano.min.css"/> <!-- 'nano' theme -->

        <!-- datepicker css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/libs/flatpickr/flatpickr.min.css">
        <!-- App Css-->
        <link href="<?php echo base_url(); ?>assets/admin/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/libs/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/pace-js/pace.min.js"></script>

        <!-- Chart JS -->
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/chart.js/Chart.bundle.min.js"></script>

        <!-- Plugins js-->
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
        
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        
        <!-- Sweet Alerts js -->
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/sweetalert2/sweetalert2.min.js"></script>

        
        <!-- ckeditor -->
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

    </head>

    <body>
    <?php
    if($this->session->flashdata('error') != '')
    {
    ?>
    <script>
        let timerInterval
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            html: "<?php echo $this->session->flashdata('error'); ?>",
            timer: 2000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        })
    </script>
    <?php
    $this->session->set_flashdata('error', '');
    }
    if($this->session->flashdata('success') != '')
    {
    ?>
    <script>
        let timerInterval
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            html: "<?php echo $this->session->flashdata('success'); ?>",
            timer: 2000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        })
    </script>
    <?php
        $this->session->set_flashdata('success', '');
    }
    ?>
    <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="<?php echo base_url();?>admin/dashboard" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url(); ?>assets/admin/assets/images/logo-sm.jpeg" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url(); ?>assets/admin/assets/images/logo-sm.jpeg" alt="" height="24"> <span class="logo-txt">BUMDes</span>
                                </span>
                            </a>

                            <a href="<?php echo base_url();?>admin/dashboard" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url(); ?>assets/admin/assets/images/logo-sm.jpeg" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url(); ?>assets/admin/assets/images/logo-sm.jpeg" alt="" height="24"> <span class="logo-txt">BUMDes</span>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                    </div>

                    <div class="d-flex">


                        <div class="dropdown d-none d-sm-inline-block">
                            <!-- <button type="button" class="btn header-item" id="mode-setting-btn">
                                <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                                <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                            </button> -->
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?php echo base_url(); ?>assets/admin/assets/images/users/avatar-1.jpg"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium">Admin</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>admin/login/logout"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" data-key="t-menu">Menu</li>

                            <li>
                                <a href="<?php echo base_url(); ?>admin/dashboard">
                                    <i data-feather="home"></i>
                                    <span data-key="t-dashboard">Dashboard</span>
                                </a>
                            </li>
                            
                            <li class="menu-title" data-key="t-menu">Menu Utama</li>
                            
                            <li>
                                <a href="<?php echo base_url(); ?>admin/kategori">
                                    <i data-feather="package"></i>
                                    <span data-key="t-dashboard">Kategori</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/produk">
                                    <i data-feather="package"></i>
                                    <span data-key="t-dashboard">Produk</span>
                                </a>
                            </li>

                            <!-- <li>
                                <a href="<?php echo base_url(); ?>admin/order">
                                    <i data-feather="clipboard"></i>
                                    <span data-key="t-dashboard">Order</span>
                                </a>
                            </li> -->
                            
                            <li>
                                <a href="<?php echo base_url(); ?>admin/transaksi">
                                    <i data-feather="book-open"></i>
                                    <span data-key="t-dashboard">Transaksi</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?php echo base_url(); ?>admin/laporan">
                                    <i data-feather="book"></i>
                                    <span data-key="t-dashboard">Laporan Transaksi</span>
                                </a>
                            </li>

                            <li class="menu-title" data-key="t-menu">Users</li>

                            <li>
                                <a href="<?php echo base_url(); ?>admin/pelanggan">
                                    <i data-feather="users"></i>
                                    <span data-key="t-dashboard">Pelanggan</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>admin/umkm">
                                    <i data-feather="truck"></i>
                                    <span data-key="t-dashboard">UMKM</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>admin/user">
                                    <i data-feather="user"></i>
                                    <span data-key="t-dashboard">User</span>
                                </a>
                            </li>

                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/assets/fonts/flaticon.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/assets/css/nice-select.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/assets/css/boxicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/assets/css/meanmenu.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/client/assets/css/settings.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/client/assets/css/layers.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/client/assets/css/navigation.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/assets/css/modal-video.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/assets/css/style.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/assets/css/responsive.css">
    <title>Ecop - Multipurpose eCommerce HTML Template</title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/client/assets/images/logo.jpeg">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/assets/css/star-input.css">
    
    <!-- Sweet Alert-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        
    <script src="<?php echo base_url(); ?>assets/client/assets/js/jquery.min.js"></script>

    <!-- Sweet Alerts js -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/admin/assets/libs/feather-icons/feather.min.js"></script>
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
            html: "<?php echo $this->session->flashdata('error'); ?>",
            timer: 2000,
            didOpen: () => {
                Swal.showLoading()
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
            html: "<?php echo $this->session->flashdata('success'); ?>",
            timer: 2000,
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

    <div class="loader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="pre-load">
                    <div class="inner one"></div>
                    <div class="inner two"></div>
                    <div class="inner three"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-top-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="left">
                        <a href="index.html">
                            <img src="<?php echo base_url(); ?>assets/client/assets/images/logo.jpeg" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="middle">
                            
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="right">
                        <ul>
                            <li>
                                <button type="button" class="btn wishlist cart-popup-btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                                    <i class='bx bxs-cart'></i>
                                    <span><?php echo $count_cart; ?></span>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="btn wishlist" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalWishlist" data-bs-whatever="@mdo">
                                    <i class='bx bx-heart'></i>
                                    <span><?php echo $count_wishlist; ?></span>
                                </button>
                            </li>
                            <?php
                            if($this->session->userdata('bumdes_nama') != null)
                            {
                            ?>
                            <li>
                                <div class="btn-group">
                                    <button type="button" class="join dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="flaticon-round-account-button-with-user-inside"></i>
                                        <?php echo $this->session->userdata('bumdes_nama'); ?>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>transaksi">Transaksi</a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>login/logout">Keluar</a></li>
                                    </ul>
                                </div>
                            </li>
                            <?php
                            }
                            else {
                            ?>
                            <li>
                                <a class="join" href="<?php echo base_url(); ?>login">
                                    <i class="flaticon-round-account-button-with-user-inside"></i>
                                    Bergabung
                                </a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="navbar-area sticky-top">

        <div class="mobile-nav">
            <a href="index.html" class="logo">
                <img style="height: 50px" src="<?php echo base_url(); ?>assets/client/assets/images/logo.jpeg" alt="Logo">
            </a>
        </div>

        <div class="main-nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md navbar-light">
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>" class="nav-link <?php if($page == 'home') echo 'active'; ?>">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>produk" class="nav-link <?php if($page == 'produk') echo 'active'; ?>">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>about" class="nav-link <?php if($page == 'about') echo 'active'; ?>">Tentang Kita</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>contact" class="nav-link <?php if($page == 'contact') echo 'active'; ?>">Kontak</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
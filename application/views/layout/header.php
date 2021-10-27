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
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/client/assets/images/favicon.png">
    
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/feather-icons/feather.min.js"></script>
</head>

<body>

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
                            <img src="<?php echo base_url(); ?>assets/client/assets/images/logo.png" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="middle">
                        <form>
                            <div class="form-group">
                                <div class="inner">
                                    <select>
                                        <option>All Categories</option>
                                        <?php 
                                        foreach($kategori as $a) {
                                        ?>
                                        <option value="<?php echo $a['id']; ?>"><?php echo $a['nama']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="text" class="form-control" placeholder="Search Your Keywords">
                                <button type="submit" class="btn">
                                    <i class='bx bx-search'></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="right">
                        <ul>
                            <li>
                                <button type="button" class="btn wishlist cart-popup-btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                                    <i class='bx bxs-cart'></i>
                                    <span>2</span>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="btn wishlist" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalWishlist" data-bs-whatever="@mdo">
                                    <i class='bx bx-heart'></i>
                                    <span>2</span>
                                </button>
                            </li>
                            <li>
                                <a class="join" href="<?php echo base_url(); ?>login">
                                    <i class="flaticon-round-account-button-with-user-inside"></i>
                                    Join
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="navbar-area sticky-top">

        <div class="mobile-nav">
            <a href="index.html" class="logo">
                <img src="<?php echo base_url(); ?>assets/client/assets/images/logo.png" alt="Logo">
            </a>
        </div>

        <div class="main-nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md navbar-light">
                    <div class="left">
                        <select>
                            <option>All Categories</option>
                            <?php
                            foreach ($kategori as $b) {
                            ?>
                            <option>Chair</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>" class="nav-link <?php if($page == 'home') echo 'active'; ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>contact" class="nav-link <?php if($page == 'produk') echo 'active'; ?>">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>about" class="nav-link <?php if($page == 'about') echo 'active'; ?>">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>contact" class="nav-link <?php if($page == 'contact') echo 'active'; ?>">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
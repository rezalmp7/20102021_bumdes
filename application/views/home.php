
    <div class="products-area ptb-100">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sorting-menu">
                        <ul class="justify-content-center">
                            <li class="filter active" data-filter="all">
                                <div class="products-thumb">
                                    <img src="<?php echo base_url(); ?>assets/client/assets/images/products/shape1.png" alt="Shape">
                                    <img src="<?php echo base_url(); ?>assets/client/assets/images/products/shape2.png" alt="Shape">
                                    <span>All</span>
                                </div>
                            </li>
                            <?php
                            foreach ($kategori as $a) {
                            ?>
                            <li class="filter" data-filter=".<?php echo $a['nama']; ?>">
                                <div class="products-thumb">
                                    <img src="<?php echo base_url(); ?>assets/client/assets/images/products/shape1.png" alt="Shape">
                                    <img src="<?php echo base_url(); ?>assets/client/assets/images/products/shape2.png" alt="Shape">
                                    <span><?php echo $a['nama']; ?></span>
                                </div>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div id="Container" class="row justify-content-center">
                        <?php
                        foreach ($produk as $a) {
                        ?>
                        <div class="col-sm-6 col-lg-4 mix <?php echo $a['nama_kategori']; ?> center-table">
                            <div class="products-item">
                                <div class="top">
                                    <a class="wishlist" href="<?php echo base_url(); ?>cart/tambah_wishlist?id_produk=<?php echo $a['id']; ?>&from=">
                                        <i class='bx bx-heart'></i>
                                    </a>
                                    <img src="<?php echo base_url(); ?>assets/img/produk/<?php echo $a['gambar']; ?>" alt="<?php echo $a['nama_produk']; ?>">
                                    <div class="inner">
                                        <h3>
                                            <a href="<?php echo base_url(); ?>produk/detail/<?php echo $a['id']; ?>"><?php echo $a['nama_produk']; ?></a>
                                        </h3>
                                        <span>Rp. <?php echo number_format($a['harga']); ?></span>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <a class="cart-text" href="<?php echo base_url(); ?>cart/tambah_aksi?id_produk=<?php echo $a['id']; ?>&from=">Add To Cart</a>
                                    <i class='bx bx-plus'></i>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="text-center">
                        <a class="common-btn" href="shop.html">
                            Lihat Lebih
                            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape1.png" alt="Shape">
                            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape2.png" alt="Shape">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products-area pb-70">
        <div class="container">
            <div class="section-title">
                <h2>Best Selling Products</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="products-item">
                        <div class="top">
                            <a class="wishlist" href="index.html#">
                                <i class='bx bx-heart'></i>
                            </a>
                            <img src="<?php echo base_url(); ?>assets/client/assets/images/products/products10.png" alt="Products">
                            <div class="inner">
                                <h3>
                                    <a href="single-product.html">White Luxury Wardrobe</a>
                                </h3>
                                <span>$200.00</span>
                            </div>
                        </div>
                        <div class="bottom">
                            <a class="cart-text" href="index.html#">Add To Cart</a>
                            <i class='bx bx-plus'></i>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="products-item">
                        <div class="top">
                            <a class="wishlist" href="index.html#">
                                <i class='bx bx-heart'></i>
                            </a>
                            <img src="<?php echo base_url(); ?>assets/client/assets/images/products/products11.png" alt="Products">
                            <div class="inner">
                                <h3>
                                    <a href="single-product.html">Wooden Wardrobe</a>
                                </h3>
                                <span>$180.00</span>
                            </div>
                        </div>
                        <div class="bottom">
                            <a class="cart-text" href="index.html#">Add To Cart</a>
                            <i class='bx bx-plus'></i>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="products-item">
                        <div class="top">
                            <a class="wishlist" href="index.html#">
                                <i class='bx bx-heart'></i>
                            </a>
                            <img src="<?php echo base_url(); ?>assets/client/assets/images/products/products12.png" alt="Products">
                            <div class="inner">
                                <h3>
                                    <a href="single-product.html">Three Door Wardrobe</a>
                                </h3>
                                <span>$170.00</span>
                            </div>
                        </div>
                        <div class="bottom">
                            <a class="cart-text" href="index.html#">Add To Cart</a>
                            <i class='bx bx-plus'></i>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="products-item">
                        <div class="top">
                            <a class="wishlist" href="index.html#">
                                <i class='bx bx-heart'></i>
                            </a>
                            <img src="<?php echo base_url(); ?>assets/client/assets/images/products/products13.png" alt="Products">
                            <div class="inner">
                                <h3>
                                    <a href="single-product.html">Classic Wooden Table</a>
                                </h3>
                                <span>$190.00</span>
                            </div>
                        </div>
                        <div class="bottom">
                            <a class="cart-text" href="index.html#">Add To Cart</a>
                            <i class='bx bx-plus'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


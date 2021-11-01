
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
                                    <a class="wishlist" href="<?php echo base_url(); ?>cart/tambah_wishlist?id_produk=<?php echo $a['id']; ?>&from=produk">
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
                                    <a class="cart-text" href="<?php echo base_url(); ?>cart/tambah_aksi?id_produk=<?php echo $a['id']; ?>&from=produk">Add To Cart</a>
                                    <i class='bx bx-plus'></i>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
\


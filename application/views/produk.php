
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
                                    <span>Semua</span>
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
                    <div class="col-12 mb-4 p-0">
                        <form method="POST" action="<?php echo base_url(); ?>produk">
                            <div class="input-group mb-3">
                                <?php 
                                {
                                ?>
                                <input type="hidden" name="search" value="true">
                                <input type="text" value="<?php if($search != null) echo $search; ?>" class="form-control" name="search_name" placeholder="Search Name" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                                <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class='bx bx-search-alt'></i></button>
                                <a class="btn btn-outline-danger" href="<?php echo base_url(); ?>produk" id="button-addon2"><i class='bx bx-reset' ></i></a>
                                <?php
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                    <div id="Container" class="row justify-content-center">
                        <?php
                        foreach ($produk as $a) {
                        ?>
                        <div class="produk col-sm-6 col-lg-4 mix <?php echo $a['nama_kategori']; ?> center-table" data-filter="<?php echo $a['nama_produk']; ?>">
                            <div class="products-item">
                                <div class="top">
                                    <a class="wishlist" href="<?php echo base_url(); ?>cart/tambah_wishlist?id_produk=<?php echo $a['id']; ?>&from=produk">
                                        <i class='bx bx-heart'></i>
                                    </a>
                                    <?php
                                    $gambar = $a['gambar'];
                                    ?>
                                    <div class="col-12 m-0 p-0" style="aspect-ratio: 10/9; background-position: center; background-image: url('<?php echo base_url(); ?>assets/img/produk/<?php echo $gambar; ?>')"></div>
                                    <div class="inner">
                                        <h3>
                                            <a href="<?php echo base_url(); ?>produk/detail/<?php echo $a['id']; ?>"><?php echo $a['nama_produk']; ?></a>
                                        </h3>
                                        <?php
                                        if($a['status'] == 'kosong')
                                        {
                                        ?>
                                        <small class="text-danger">Kosong</small>
                                        <?php
                                        }
                                        else {
                                        ?>
                                        <small class="text-success">Ada</small>
                                        <?php
                                        }
                                        ?>
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
    <!-- <script>
        if (!RegExp.escape) {
            RegExp.escape = function (value) {
                return value.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&")
            };
        }

        var $medias = $('#Container'),
            $h4s = $medias.find('> .produk h3');

        $('#filter_produk').keyup(function () {
            var filter = this.value,
                regex;
            if (filter) {
                regex = new RegExp(RegExp.escape(this.value), 'i')
                var $found = $h4s.filter(function () {
                    return regex.test($(this).text())
                }).closest('.produk').show();
                $medias.not($found).hide()
            } else {
                $medias.show();
            }
        });
    </script> -->


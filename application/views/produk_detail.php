
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2><?php echo $produk['nama']; ?></h2>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <span><?php echo $produk['nama']; ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="title-img">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/page-title2.jpg" alt="About">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape16.png" alt="Shape">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape17.png" alt="Shape">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape18.png" alt="Shape">
        </div>
    </div>


    <div class="product-details-area ptb-100">
        <div class="container">
            <div class="top">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="outer">
                            <div class="item">
                                <div class="top-img">
                                    <img src="<?php echo base_url(); ?>assets/img/produk/<?php echo $produk['gambar']; ?>" alt="Product">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="top-content">
                            <h2><?php echo $produk['nama']; ?></h2>
                            <ul class="reviews">
                                <?php
                                $mean_rating = round($rata_rata_rating['mean_rating']);
                                echo $mean_rating;
                                for ($i=1; $i <= 5 ; $i++) { 
                                ?>
                                <li>
                                    <i class="bx bxs-star <?php if($i <= $mean_rating) echo 'checked'; ?>"></i>
                                </li>
                                <?php
                                }
                                ?>
                                <li>
                                    <span>(<?php echo $count_rating; ?> Reviews)</span>
                                </li>
                                <li>
                                    <h3>Rp <?php echo number_format($produk['harga']); ?></h3>
                                </li>
                            </ul>
                            <ul class="tag">
                                <li>Kategori: <span><?php echo $kategori_body['nama']; ?></span></li>
                                <li>Status: <?php if($produk['status'] == 'kosong') echo "<span class='text-danger'>Kosong</span>"; else echo "<span class='text-success'>Ada</span>"; ?></li>
                            </ul>
                            <form method="post" action="<?php echo base_url(); ?>cart/tambah_aksi">
                                <input type="hidden" name="id_produk" value="<?php echo $produk['id']; ?>">
                                <ul class="cart">
                                    <li>
                                        <ul class="number">
                                            <li>
                                                <span class="minus">-</span>
                                                <input type="text" name="qty" value="1"/>
                                                <span class="plus">+</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <button class="common-btn" type="submit" <?php if($produk['status'] == 'kosong') echo 'disabled'; ?>>
                                            Add To Cart
                                            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape1.png" alt="Shape">
                                            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape2.png" alt="Shape">
                                        </button>
                                    </li>
                                </ul>
                            </form>
                            <a class="wishlist-btn" href="<?php echo base_url(); ?>cart/tambah_wishlist?id_produk=<?php echo $produk['id']; ?>&from=produk">
                                <i class='bx bx-heart'></i>
                                Tambah ke suka
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            href="#pills-home" role="tab" aria-controls="pills-home"
                            aria-selected="true">Deskripsi</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            href="#pills-profile" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Ulasan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="bottom-description">
                            <?php echo $produk['deskripsi']; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="bottom-review">
                            <h3>Leave A Review</h3>
                            <form method="POST" action="<?php echo base_url(); ?>rating/tambah_rating">
                                <input type="hidden" name="id_produk" value="<?php echo $produk['id']; ?>">
                                <div class="rating">
                                    <label>
                                        <input type="radio" name="rating" value="1" />
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating" value="2" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating" value="3" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>   
                                    </label>
                                    <label>
                                        <input type="radio" name="rating" value="4" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating" value="5" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <textarea id="your-comments" rows="8" class="form-control"
                                        placeholder="Comments" name="comment"></textarea>
                                </div>
                                <button type="submit" class="btn common-btn">
                                    Post A Review
                                    <img src="assets/images/shape1.png" alt="Shape">
                                    <img src="assets/images/shape2.png" alt="Shape">
                                </button>
                            </form>
                        </div>
                        <div class="bottom-comment mt-5">
                            <ul class="comments">
                                <?php
                                foreach ($rating as $ra) {
                                ?>
                                <li>
                                    <h4><?php echo $ra['nama']; ?></h4>
                                    <span><?php echo date('d F Y', strtotime($ra['create_at'])); ?></span>
                                    <p>
                                        <?php echo $ra['comment']; ?>
                                    </p>
                                    <ul class="reviews">
                                        <?php
                                        for ($i=1; $i <= 5; $i++) { 
                                            $rating = $ra['rating'];
                                        ?>
                                        <li>
                                            <i class="bx bxs-star <?php if($i<=$rating) echo 'checked';?>"></i>
                                        </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
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
    </div>
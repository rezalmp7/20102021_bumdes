
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>Single Product</h2>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <span>Single Product</span>
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
                                <li>
                                    <i class="bx bxs-star checked"></i>
                                </li>
                                <li>
                                    <i class="bx bxs-star checked"></i>
                                </li>
                                <li>
                                    <i class="bx bxs-star checked"></i>
                                </li>
                                <li>
                                    <i class="bx bxs-star checked"></i>
                                </li>
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                                <li>
                                    <span>(2 Reviews)</span>
                                </li>
                                <li>
                                    <h3>Rp <?php echo number_format($produk['harga']); ?></h3>
                                </li>
                            </ul>
                            <ul class="tag">
                                <li>Category: <span><?php echo $kategori['nama']; ?></span></li>
                                <li>Stok: <span><?php echo $produk['stok']; ?></span></li>
                            </ul>
                            <form method="post" action="<?php echo base_url(); ?>cart/tambah_aksi">
                                <ul class="cart">
                                    <li>
                                        <ul class="number">
                                            <li>
                                                <span class="minus">-</span>
                                                <input type="text" value="1" max="<?php echo $produk['stok']; ?>"/>
                                                <span class="plus">+</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <button class="common-btn" type="submit">
                                            Add To Cart
                                            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape1.png" alt="Shape">
                                            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape2.png" alt="Shape">
                                        </button>
                                    </li>
                                </ul>
                            </form>
                            <a class="wishlist-btn" href="single-product.html#">
                                <i class='bx bx-heart'></i>
                                Add To Heart
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
                            aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            href="#pills-profile" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Reviews</a>
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
                        <div class="bottom-comment">
                            <ul class="comments">
                                <li>
                                    <h4>Tom Henry</h4>
                                    <span>01 December, 2021</span>
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                                        vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren
                                    </p>
                                    <ul class="reviews">
                                        <li>
                                            <i class="bx bxs-star checked"></i>
                                        </li>
                                        <li>
                                            <i class="bx bxs-star checked"></i>
                                        </li>
                                        <li>
                                            <i class="bx bxs-star checked"></i>
                                        </li>
                                        <li>
                                            <i class="bx bxs-star checked"></i>
                                        </li>
                                        <li>
                                            <i class="bx bxs-star"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <h4>Angele Carter</h4>
                                    <span>02 December, 2021</span>
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                                        vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren
                                    </p>
                                    <ul class="reviews">
                                        <li>
                                            <i class="bx bxs-star checked"></i>
                                        </li>
                                        <li>
                                            <i class="bx bxs-star checked"></i>
                                        </li>
                                        <li>
                                            <i class="bx bxs-star checked"></i>
                                        </li>
                                        <li>
                                            <i class="bx bxs-star checked"></i>
                                        </li>
                                        <li>
                                            <i class="bx bxs-star"></i>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="bottom-review">
                            <h3>Leave A Review</h3>
                            <form>
                                <div class="rating">
                                    <label>
                                        <input type="radio" name="stars" value="1" />
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="stars" value="2" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="stars" value="3" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>   
                                    </label>
                                    <label>
                                        <input type="radio" name="stars" value="4" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="stars" value="5" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <textarea id="your-comments" rows="8" class="form-control"
                                        placeholder="Comments"></textarea>
                                </div>
                                <button type="submit" class="btn common-btn">
                                    Post A Review
                                    <img src="assets/images/shape1.png" alt="Shape">
                                    <img src="assets/images/shape2.png" alt="Shape">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
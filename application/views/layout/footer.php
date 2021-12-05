
    <footer class="footer-area pt-100 pb-70">
        <div class="footer-shape">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/footer-right-shape.png" alt="Shape">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape5.png" alt="Shape">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="footer-item">
                        <div class="footer-logo">
                            <a class="logo" href="index.html">
                                <img src="<?php echo base_url(); ?>assets/client/assets/images/logo.jpeg" alt="Logo" style="height: 50px">
                            </a>
                            <ul>
                                <li>
                                    <i class="flaticon-pin"></i>
                                    <a href="index.html#">Jl. Kendalisodo No. 6 , Desa Doplang, Kecamatan Bawen, Kabupaten Semarang</a>
                                </li>
                                <li>
                                    <i class="flaticon-phone-call"></i>
                                    <a href="tel:+9908314326">0298 522156</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="footer-item">
                        <div class="footer-services">
                            <h3>Menu</h3>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>produk">Produk</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>about">Tentang Kami</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>contact">Kontak</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="footer-item">
                        <div class="footer-links">
                            <h3>Kategori Terbaru</h3>
                            <div class="row">
                                <div class="col-6 col-sm-4 col-lg-4">
                                    <ul>
                                        <?php
                                        foreach ($kategori as $fookat) {
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>"><?php echo $fookat['nama']; ?></a>
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
            <div class="row align-items-center">
                <!-- <div class="col-sm-6 col-lg-6">
                    <div class="payment-cards">
                        <ul>
                            <li>
                                <a href="index.html#" target="_blank">
                                    <img src="<?php echo base_url(); ?>assets/client/assets/images/payment1.png" alt="Payment">
                                </a>
                            </li>
                            <li>
                                <a href="index.html#" target="_blank">
                                    <img src="<?php echo base_url(); ?>assets/client/assets/images/payment2.png" alt="Payment">
                                </a>
                            </li>
                            <li>
                                <a href="index.html#" target="_blank">
                                    <img src="<?php echo base_url(); ?>assets/client/assets/images/payment3.png" alt="Payment">
                                </a>
                            </li>
                            <li>
                                <a href="index.html#" target="_blank">
                                    <img src="<?php echo base_url(); ?>assets/client/assets/images/payment4.png" alt="Payment">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="social-links">
                        <ul>
                            <li>
                                <a href="index.html#" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#" target="_blank">
                                    <i class='bx bxl-linkedin'></i>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#" target="_blank">
                                    <i class='bx bxl-skype'></i>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#" target="_blank">
                                    <i class='bx bxl-youtube'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </footer>


    <div class="copyright-area">
        <div class="container">
            <div class="copyright-item">
                <p>Copyright ©<?php echo date('Y'); ?></p>
            </div>
        </div>
    </div>


    <div class="modal fade modal-right popup-modal" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Keranjang <span><?php echo $count_cart; ?> Barang</span></h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?php echo base_url(); ?>checkout/update_cart">
                    <div class="modal-body">
                        <div class="cart-table">
                            <table class="table">
                                <tbody>
                                    <?php
                                    foreach ($cart as $ca) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <?php $id_cart = $ca['id_cart']; ?>
                                                <input class="form-check-input" type="checkbox" name="chekced_id" onclick="myFunction('checkCart<?php echo $id_cart; ?>')" value="<?php echo $id_cart; ?>" id="checkCart<?php echo $id_cart; ?>" <?php if($ca['checked'] == 'check') echo "checked"; ?>>
                                            </div>
                                        </td>
                                        <th scope="row">
                                            <input type="hidden" name="id[]" value="<?php echo $ca['id_cart']; ?>">
                                            <img src="<?php echo base_url(); ?>assets/img/produk/<?php echo $ca['gambar']; ?>" alt="Cart">
                                        </th>
                                        <td>
                                            <h3><?php echo $ca['nama']; ?></h3>
                                            <span class="rate">Rp <?php echo number_format($ca['harga']); ?></span>
                                        </td>
                                        <td>
                                            <ul class="number">
                                                <li>
                                                    <span class="minus">-</span>
                                                    <input type="text" name="qty[]" value="<?php echo $ca['qty']; ?>" />
                                                    <span class="plus">+</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <a class="close" href="<?php echo base_url(); ?>cart/hapus/<?php echo $ca['id_cart']; ?>">
                                                <i class='bx bx-x'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn common-btn">
                            Proses
                            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape1.png" alt="Shape">
                            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape2.png" alt="Shape">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade modal-right popup-modal wishlist-modal" id="exampleModalWishlist" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Suka <span><?php echo $count_wishlist; ?> Barang</span></h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="cart-table">
                        <table class="table">
                            <tbody>
                                <?php
                                foreach ($wishlist as $wl) {
                                ?>
                                <tr>
                                    <th scope="row">
                                        <img src="<?php echo base_url(); ?>assets/img/produk/<?php echo $wl['gambar']; ?>" alt="Cart">
                                    </th>
                                    <td>
                                        <h3><?php echo $wl['nama']; ?></h3>
                                        <span class="rate">Rp. <?php echo number_format($wl['harga']); ?></span>
                                    </td>
                                    <td>
                                        <a class="common-btn" href="<?php echo base_url(); ?>cart/tambah_wishlist?id_produk=<?php echo $wl['id_produk']; ?>&from=produk">
                                            <i class="bx bxs-cart"></i>
                                            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape1.png" alt="Shape">
                                            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape2.png" alt="Shape">
                                        </a>
                                    </td>
                                    <td>
                                        <a class="close" href="<?php echo base_url(); ?>cart/hapus_wishlist/<?php echo $wl['id_wishlist']; ?>">
                                            <i class='bx bx-x'></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="go-top">
        <i class='bx bxs-up-arrow-circle'></i>
        <i class='bx bxs-up-arrow-circle'></i>
    </div>


    <script src="<?php echo base_url(); ?>assets/client/assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/assets/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/client/assets/js/form-validator.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/client/assets/js/contact-form-script.js"></script>

    <script src="<?php echo base_url(); ?>assets/client/assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/client/assets/js/jquery.nice-select.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/client/assets/js/jquery.meanmenu.js"></script>

    <script src="<?php echo base_url(); ?>assets/client/assets/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/assets/js/jquery.themepunch.revolution.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/client/assets/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/assets/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/assets/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/assets/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/assets/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/assets/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/assets/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/assets/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/assets/js/extensions/revolution.extension.video.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/client/assets/js/jquery.mixitup.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/client/assets/js/owl.carousel.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/client/assets/js/jquery-modal-video.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/client/assets/js/thumb-slide.js"></script>

    <script src="<?php echo base_url(); ?>assets/client/assets/js/star-input.js"></script>  
    <script src="<?php echo base_url(); ?>assets/client/assets/js/custom.js"></script>

    <script>
        function myFunction(e) {
            var checkBox = document.getElementById(e);
            var val_checkBox = checkBox.value;
            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
                // GET Request.
                fetch('<?php echo base_url(); ?>cart/checked_cart?id='+val_checkBox+'&check=true')
                    // Handle success
                    .then(response => response.json())  // convert to json
                    .then(json => {
                        if(json.checked == 'uncheck')
                        {
                            checkBox.checked = false;

                            let timerInterval
                            Swal.fire({
                                position: 'top-start',
                                icon: 'error',
                                html: "Gagal Check Cart Coba Lagi",
                                timer: 2000,
                                didOpen: () => {
                                    Swal.showLoading()
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                                }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    console.log('I was closed by the timer');
                                }
                            })
                        }
                        else
                        {
                            checkBox.checked = true;

                            let timerInterval
                            Swal.fire({
                                position: 'top-start',
                                icon: 'success',
                                html: "Berhasil Check Cart",
                                timer: 2000,
                                didOpen: () => {
                                    Swal.showLoading()
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
                        }
                    })    //print data to console
                    .catch(err => console.log('Request Failed', err)); // Catch errors
            } else {
                fetch('<?php echo base_url(); ?>cart/checked_cart?id='+val_checkBox+'&check=false')
                    // Handle success
                    .then(response => response.json())  // convert to json
                    .then(json => {
                        if(json.checked == 'check')
                        {
                            checkBox.checked = true;

                            let timerInterval
                            Swal.fire({
                                position: 'top-start',
                                icon: 'error',
                                html: "Gagal Uncheck Cart Coba Lagi",
                                timer: 2000,
                                didOpen: () => {
                                    Swal.showLoading()
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
                        }
                        else
                        {
                            checkBox.checked = false;

                            let timerInterval
                            Swal.fire({
                                position: 'top-start',
                                icon: 'success',
                                html: "Berhasil Uncheck Cart",
                                timer: 2000,
                                didOpen: () => {
                                    Swal.showLoading()
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
                        }
                    })    //print data to console
                    .catch(err => console.log('Request Failed', err)); // Catch errors

            }
        }
    </script>
</body>

</html>


    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>Checkout</h2>
                        <ul>
                            <li>
                                <a href="<?php echo base_url(); ?>">Home</a>
                            </li>
                            <li>
                                <span>Checkout</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="title-img">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/page-title1.jpg" alt="About">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape16.png" alt="Shape">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape17.png" alt="Shape">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape18.png" alt="Shape">
        </div>
    </div>


    <div class="checkout-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <h2>Detail Penerima</h2>
            </div>
            <form method="POST" action="<?php echo base_url(); ?>transaksi/create_transaksi">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="checkout-billing">
                            <div class="form-group">
                                <input type="text" value="<?php echo $pelanggan['nama']; ?>" class="form-control" name="nama_penerima" placeholder="Nama Penerima:" required>
                            </div>
                            <div class="form-group">
                                <textarea id="your-notes" rows="4" class="form-control" name="alamat_penerima"
                                    placeholder="Alamat Penerima" required><?php echo $pelanggan['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="number" value="<?php echo $pelanggan['no_hp']; ?>" name="nomor_penerima" class="form-control" placeholder="No Hp Penerima:" required>
                            </div>
                            <div class="form-group">
                                <textarea id="your-notes" rows="4" name="note" class="form-control"
                                    placeholder="Notes (Optional)"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="checkout-order">
                            <h3>Pesanan Anda:</h3>
                            <?php
                            $sub_harga = 0;
                            foreach ($cart_body as $a) {
                            ?>
                            <input type="hidden" name="id_produk[]" value="<?php echo $a['id_produk']; ?>">
                            <input type="hidden" name="harga_produk[]" value="<?php echo $a['harga']; ?>">
                            <input type="hidden" name="nama_produk[]" value="<?php echo $a['nama']; ?>">
                            <input type="hidden" name="qty[]" value="<?php echo $a['qty']; ?>">
                            <ul class="align-items-center">
                                <li>
                                    <img src="<?php echo base_url(); ?>assets/img/produk/<?php echo $a['gambar']; ?>" alt="Checkout">
                                </li>
                                <li>
                                    <h4><?php echo $a['nama']; ?></h4>
                                    <span class="rate"><sup>Rp</sup> <?php echo number_format($a['harga']); ?> x <?php echo $a['qty']; ?></span>
                                </li>
                                <li>
                                    <?php $total_harga = $a['harga']*$a['qty']; ?>
                                    <span><sup>Rp</sup> <?php echo number_format($total_harga); ?></span>
                                </li>
                            </ul>
                            <?php
                            $sub_harga = $sub_harga+$total_harga;
                            }
                            ?>
                            <div class="inner">
                                <input type="hidden" value="<?php echo $sub_harga; ?>" name="sub_harga">
                                <h3>Sub Harga: <span><sup>Rp</sup> <?php echo number_format($sub_harga); ?></span></h3>
                            </div>
                        </div>
                        <div class="checkout-method">
                            <div class="col-12 m-0 p-0" id="cont_pengiriman">
                                <h3>Metode Pengiriman:</h3>
                                <div class="form-check d-block col-12 mt-4">
                                    <select class="form-select col-12" size="3" id="metode_pengiriman" name="pengiriman" required>
                                        <option value="" selected>-- Pilih Metode Pengiriman --</option>
                                        <option value="cod">COD</option>
                                        <option value="kirim">Kirim ke alamant</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="col-12 m-0 p-0" id="cont_pembayaran">
                                <h3>Metode Pembayaran:</h3>
                                <div class="form-check d-block col-12">
                                    <select class="form-select col-12" size="3" id="metode_pembayaran" name="payment" required>
                                        <option value="" selected>-- Pilih Metode Pembayaran --</option>
                                        <?php
                                        $i = 0;
                                        foreach ($channel_pembayaran as $cp) {
                                            if($cp->active != true)
                                            {
                                                continue;
                                            }
                                        ?>
                                        <option value="<?php echo $cp->code; ?>"><?php echo $cp->name; ?></option>
                                        <?php
                                        $i++;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <table class="col-12">
                                <tr>
                                    <td>Sub Harga</td>
                                    <td>Rp <?php echo number_format($sub_harga); ?></td>
                                    <input type="hidden" name="sub_harga" value="<?php echo $sub_harga; ?>">
                                </tr>
                                <tr>
                                    <td>Admin</td>
                                    <td id="biaya_admin">Pilih Metode</td>
                                    <input type="hidden" id="input_biaya_admin" name="admin" >
                                </tr>
                                <tr>
                                    <td>Total Harga</td>
                                    <td><span id="total_harga"></span></td>
                                    <input type="hidden" id="input_total_harga" name="total_harga">
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn common-btn">
                        Place Order
                        <img src="<?php echo base_url(); ?>assets/client/assets/images/shape1.png" alt="Shape">
                        <img src="<?php echo base_url(); ?>assets/client/assets/images/shape2.png" alt="Shape">
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $("#cont_pembayaran").hide();
        $("#metode_pengiriman").change(function() {
            var value = $("#metode_pengiriman").val();
            
            if(value == 'cod')
            {
                $("#cont_pembayaran").hide();
                var money_biaya_admin = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(0);
                $("#biaya_admin").html(money_biaya_admin);
                $("#input_biaya_admin").val(0);
                var total_harga = 0+<?php echo $sub_harga; ?>;
                var money_total_harga = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(total_harga)
                $("#total_harga").html(money_total_harga);
                $("#input_total_harga").val(total_harga);

                $('#metode_pembayaran').prop('required',false);
            }
            else{
                $("#cont_pembayaran").show();

                $('#metode_pembayaran').prop('required',true);
            }
        })
        $("#metode_pembayaran").change(function() {
            var value = $("#metode_pembayaran").val();

            fetch('<?php echo base_url(); ?>checkout/detail_metode?id='+value)
                .then(response => response.json())
                .then(response => {
                    console.log(response.data); // JSON data parsed by `data.json()` call
                    var money_biaya_admin = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(response.data[0].total_fee.flat);
                    $("#biaya_admin").html(money_biaya_admin);
                    $("#input_biaya_admin").val(response.data[0].total_fee.flat);
                    var total_harga = response.data[0].total_fee.flat+<?php echo $sub_harga; ?>;
                    var money_total_harga = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(total_harga)
                    $("#total_harga").html(money_total_harga);
                    $("#input_total_harga").val(total_harga);
                });
        })
    </script>
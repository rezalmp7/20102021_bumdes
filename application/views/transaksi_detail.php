

    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>Detail Transaksi</h2>
                        <ul>
                            <li>
                                <a href="<?php echo base_url(); ?>">Home</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>transaksi">Transaksi</a>
                            </li>
                            <li>
                                <span>Detail</span>
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
                <h2>Detail Transaksi</h2>
            </div>
            <div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-order">
                            <h3>Data Penerima:</h3>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <?php
                                                switch ($transaksi['status']) {
                                                    case 'unpaid':
                                                        echo "<span class='badge bg-warning'>Menunggu Pembayaran</span>";
                                                        break;
                                                    case 'paid':
                                                        echo "<span class='badge bg-primary'>Terbayarkan</span>";
                                                        break;
                                                    case 'process':
                                                        echo "<span class='badge bg-warning'>Proses</span>";
                                                        break;
                                                    case 'done':
                                                        echo "<span class='badge bg-success'>Selesai</span>";
                                                        break;
                                                    case 'expired':
                                                        echo "<span class='badge bg-danger'>Expired</span>";
                                                        break;
                                                    case 'cancel':
                                                        echo "<span class='badge bg-danger'>Cancel</span>";
                                                        break;
                                                    default:
                                                        echo "Status Error";
                                                        break;
                                                }
                                            ?>    
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Penerima</td>
                                        <td><?php echo $transaksi['nama_penerima']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No Hp Penerima</td>
                                        <td><?php echo $transaksi['nohp_penerima']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Penerima</td>
                                        <td><?php echo $transaksi['alamat_penerima']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Metode Pengiriman</td>
                                        <td><b><?php echo $transaksi['metode_pengiriman']; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Kode Pembayaran</td>
                                        <td><?php if(isset($data_tripay)) echo $data_tripay->pay_code; else echo '-'; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php
                        if(isset($data_tripay))
                        {
                        ?>
                        <div>
                            <div class="checkout-order">
                                <h3>Cara Pembayaran:</h3>
                                <?php
                                foreach ($data_tripay->instructions as $dt) {
                                ?>
                                    <h5><?php echo $dt->title; ?></h5>
                                    <ol>
                                    <?php
                                    foreach ($dt->steps as $dts) {
                                    ?>
                                        <li><?php echo $dts; ?></li>
                                    <?php
                                    }
                                    ?>
                                    </ol>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-order">
                            <h3>Pesanan:</h3>
                            <?php
                            $sub_harga = 0;
                            foreach ($pesanan as $a) {
                            ?>
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
                                <h3>Sub Harga: <span><sup>Rp</sup> <?php echo number_format($sub_harga); ?></span></h3>
                            </div>
                        </div>
                        <div class="checkout-method">
                            <h3>Metode Pembayaran:</h3>
                            <table class="col-12 table">
                                <tr>
                                    <td>Metode Pembayaran</td>
                                    <td><?php if(isset($data_tripay)) echo $data_tripay->payment_name; else echo '-'; ?></td>
                                </tr>
                                <tr>
                                    <td>Sub Total</td>
                                    <td>Rp <?php echo number_format($sub_harga); ?></td>
                                </tr>
                                <tr>
                                    <td>Admin</td>
                                    <td id="biaya_admin">Rp <?php if(isset($data_tripay)) echo number_format($data_tripay->total_fee); else echo '0'; ?></td>
                                </tr>
                                <tr>
                                    <td>Total Harga</td>
                                    <td>Rp <?php if(isset($data_tripay)) echo number_format($data_tripay->amount); else echo number_format($transaksi['total_harga']); ?></td>
                                </tr>
                            </table>
                            <input type="hidden" name="total_harga" id="input_total_harga" value="<?php echo $total_harga; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
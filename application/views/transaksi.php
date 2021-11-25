<div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>Transaksi</h2>
                        <ul>
                            <li>
                                <a href="<?php echo base_url(); ?>">Home</a>
                            </li>
                            <li>
                                <span>Transaksi</span>
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


    <div class="user-area ptb-100">
        <div class="container">
            <div class="">
                <?php 
                foreach ($transaksi as $a) {
                ?>
                <a style="color: black" href="<?php echo base_url(); ?>transaksi/detail/<?php echo $a['id']; ?>">
                    <div class="card mt-4 mb-4">
                        <h5 class="card-header"><?php echo date('d F Y', strtotime($a['create_at'])); ?></h5>
                        <div class="card-body">
                            <?php
                                switch ($a['status']) {
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
                            <h5 class="card-title"><?php echo $a['nama_penerima']; ?></h5>
                            <p class="p-0 m-0"><?php echo $a['alamat_penerima']; ?></p>
                            <p class="p-0 m-0"><?php echo $a['nohp_penerima']; ?></p>
                        </div>
                    </div>
                </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
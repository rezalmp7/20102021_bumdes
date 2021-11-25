<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Transaksi</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Transaksi</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Transaksi</h4>
                                    </div>
                                    <div class="card-body table-responsive">
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Status</th>
                                                    <th>Nama Penerima</th>
                                                    <th>No HP Penerima</th>
                                                    <th>Alamat Penerima</th>
                                                    <th>Total Harga</th>
                                                    <th>Metode Pembayaran</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $no = 1;
                                                foreach ($transaksi as $a) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $a['create_at']; ?></td>
                                                    <td>
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
                                                    </td>
                                                    <td><?php echo $a['nama_penerima']; ?></td>
                                                    <td><?php echo $a['nohp_penerima']; ?></td>
                                                    <td><?php echo $a['alamat_penerima']; ?></td>
                                                    <td><?php echo 'Rp '.number_format($a['total_harga']); ?></td>
                                                    <td><?php echo $a['metode_pembayaran']; ?></td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="<?php echo base_url(); ?>admin/transaksi/detail/<?php echo $a['id']; ?>" class="btn btn-sm btn-soft-primary waves-effect waves-light"><i class="bx bx-show-alt"></i></a>
                                                            <?php
                                                            switch ($a['status']) {
                                                                case 'paid':
                                                                    ?>
                                                                    <a href="<?php echo base_url(); ?>admin/transaksi/proses/<?php echo $a['id']; ?>" class="btn btn-sm btn-soft-warning waves-effect waves-light"><i class="bx bx-hourglass"></i></a>
                                                                    <?php
                                                                    break;
                                                                case 'process':
                                                                    ?>
                                                                    <a href="<?php echo base_url(); ?>admin/transaksi/done/<?php echo $a['id']; ?>" class="btn btn-sm btn-soft-success waves-effect waves-light"><i class="bx bx-check"></i></a>
                                                                    <?php
                                                                    break;
                                                                default:
                                                                    # code...
                                                                    break;
                                                            }
                                                            ?>
                                                            <!-- <a href="<?php echo base_url(); ?>admin/transaksi/hapus/<?php echo $a['id']; ?>" class="btn btn-sm btn-soft-danger waves-effect waves-light"><i class="bx bxs-trash"></i></a> -->
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                $no++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                </div>
                <!-- End Page-content -->
                <script>
                    $(document).ready(function() {
                        $('#datatable').DataTable();
                    } );
                </script>
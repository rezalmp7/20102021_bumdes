            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Laporan Transaksi</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Laporan Transaksi</li>
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
                                        <a target="_blank" href="<?php echo base_url(); ?>admin/laporan/cetak" class="btn btn-success waves-effect waves-light">
                                            <i class="bx bxs-printer font-size-16 align-middle me-2"></i> Cetak
                                        </a>
                                    </div>
                                    <div class="card-body table-responsive">
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Penerima</th>
                                                    <th>No HP Penerima</th>
                                                    <th>Alamat Penerima</th>
                                                    <th>Total Harga</th>
                                                    <th>Metode Pembayaran</th>
                                                    <th>Tgl Transaksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $no = 1;
                                                foreach ($transaksi as $a) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $a['nama_penerima']; ?></td>
                                                    <td><?php echo $a['nohp_penerima']; ?></td>
                                                    <td><?php echo $a['alamat_penerima']; ?></td>
                                                    <td><?php echo 'Rp '.number_format($a['total_harga']); ?></td>
                                                    <td><?php echo $a['metode_pembayaran']; ?></td>
                                                    <td><?php echo date('d F Y', strtotime($a['create_at'])); ?></td>
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
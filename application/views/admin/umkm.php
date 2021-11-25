<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">DataTables</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">UMKM</li>
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
                                        <h4 class="card-title">UMKM</h4>
                                        <a href="<?php echo base_url(); ?>admin/umkm/tambah" class="btn btn-success waves-effect waves-light">
                                            <i class="bx bx-plus font-size-16 align-middle me-2"></i> Tambah
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>No Hp</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $no = 1;
                                                foreach ($umkm as $a) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $a['nama']; ?></td>
                                                    <td><?php echo $a['alamat']; ?></td>
                                                    <td><?php echo $a['phone']; ?></td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="<?php echo base_url(); ?>admin/umkm/detail/<?php echo $a['id']; ?>" class="btn btn-sm btn-soft-primary waves-effect waves-light"><i class="bx bx-show-alt"></i></a>
                                                            <a href="<?php echo base_url(); ?>admin/umkm/edit/<?php echo $a['id']; ?>" class="btn btn-sm btn-soft-warning waves-effect waves-light"><i class="bx bx-pencil"></i></a>
                                                            <a href="<?php echo base_url(); ?>admin/umkm/hapus/<?php echo $a['id']; ?>" class="btn btn-sm btn-soft-danger waves-effect waves-light"><i class="bx bxs-trash"></i></a>
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
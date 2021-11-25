            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Profile UMKM</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Profile UMKM</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm order-2 order-sm-1">
                                                <div class="d-flex align-items-start mt-3 mt-sm-0">
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-16 mb-1"><?php echo $umkm['nama']; ?></h5>
                                                            <p class="text-muted font-size-13"><?php echo $umkm['alamat']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-auto order-1 order-sm-2">
                                                <div class="d-flex align-items-start justify-content-end gap-2">
                                                    <div>
                                                        <a href="<?php echo base_url(); ?>" class="btn btn-soft-light"><i class="me-1"></i> 0<?php echo $umkm['phone']; ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link px-3 active" data-bs-toggle="tab" href="apps-contacts-profile.html#overview" role="tab">Produk</a>
                                            </li>
                                            <!-- <li class="nav-item">
                                                <a class="nav-link px-3" data-bs-toggle="tab" href="apps-contacts-profile.html#about" role="tab">Transaksi</a>
                                            </li> -->
                                        </ul>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                                <div class="tab-content">
                                    <div class="tab-pane active" id="overview" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Produk</h5>
                                            </div>
                                            <div class="card-body">
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Kategori</th>
                                                            <th>Harga</th>
                                                            <th>Gambar</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $no = 1;
                                                        foreach ($produk as $a) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $a['nama_produk']; ?></td>
                                                            <td><?php echo $a['nama_kategori']; ?></td>
                                                            <td><?php echo $a['harga']; ?></td>
                                                            <td><img class="rounded" style="height: 80px;" src="<?php echo base_url(); ?>assets/img/produk/<?php echo $a['gambar']; ?>"></td>
                                                            <td>
                                                                <?php
                                                                if($a['status'] == 'kosong')
                                                                {
                                                                ?>
                                                                <span class="text-white bg-danger p-1 rounded">Kosong</span>
                                                                <?php
                                                                }
                                                                else {
                                                                ?>
                                                                <span class="text-white bg-success p-1 rounded">Ada</span>
                                                                <?php
                                                                }
                                                                ?><br>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo base_url(); ?>produk/detail/<?php echo $a['id']; ?>" class="btn btn-primary btn-sm">Detail</a>
                                                        </tr>
                                                        <?php
                                                        $no++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!-- end tab pane -->

                                    <div class="tab-pane" id="about" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Transaksi</h5>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <div class="pb-3">
                                                        <h5 class="font-size-15">Bio :</h5>
                                                        <div class="text-muted">
                                                            <p class="mb-2">Hi I'm Phyllis Gatlin, Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>
                                                            <p class="mb-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at it has a more-or-less normal distribution of letters</p>
                                                            <p>It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth.</p>

                                                            <ul class="list-unstyled mb-0">
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Donec vitae sapien ut libero venenatis faucibus</li>
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Quisque rutrum aenean imperdiet</li>
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Integer ante a consectetuer eget</li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="pt-3">
                                                        <h5 class="font-size-15">Experience :</h5>
                                                        <div class="text-muted">
                                                            <p>If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc</p>

                                                            <ul class="list-unstyled mb-0">
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Donec vitae sapien ut libero venenatis faucibus</li>
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Quisque rutrum aenean imperdiet</li>
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Integer ante a consectetuer eget</li>
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Phasellus nec sem in justo pellentesque</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!-- end tab pane -->
                                </div>
                                <!-- end tab content -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

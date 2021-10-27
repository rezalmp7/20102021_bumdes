<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Edit Produk</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/produk">Produk</a></li>
                                            <li class="breadcrumb-item active">Edit</li>
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
                                        <h4 class="card-title">Edit Produk</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/produk/edit_aksi">
                                            <input type="hidden" name="id" value="<?php echo $produk['id']; ?>">
                                            <input type="hidden" name="gambar_lama" value="<?php echo $produk['gambar']; ?>">
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="nama" value="<?php echo $produk['nama']; ?>" class="form-control" id="horizontal-firstname-input" placeholder="Nama">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">UMKM</label>
                                                <div class="col-sm-9">
                                                    <select class="form-select" name="umkm">
                                                        <option>-- Pilih UMKM --</option>
                                                        <?php
                                                        foreach ($umkm as $a) {
                                                        ?>
                                                        <option value="<?php echo $a['id']; ?>" <?php if($a['id'] == $produk['umkm']) echo 'selected'; ?>><?php echo $a['nama']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kategori</label>
                                                <div class="col-sm-9">
                                                    <select class="form-select" name="kategori">
                                                        <option>-- Pilih Kategori --</option>
                                                        <?php
                                                        foreach ($kategori as $b) {
                                                        ?>
                                                        <option value="<?php echo $b['id']; ?>" <?php if($b['id'] == $produk['kategori']) echo 'selected'; ?>><?php echo $b['nama']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Harga</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="harga" class="form-control" id="horizontal-firstname-input" value="<?php echo $produk['harga']; ?>" placeholder="Harga">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Stok</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="stok" class="form-control" id="horizontal-firstname-input" value="<?php echo $produk['stok']; ?>" placeholder="Stok">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Ganti Gambar</label>
                                                <div class="col-sm-9">
                                                    <img class="rounded" style="height:100px" src="<?php echo base_url(); ?>assets/img/produk/<?php echo $produk['gambar']; ?>"><br><br>
                                                    <input type="file" class="form-control-file"  name="gambar" id="exampleFormControlFile1">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Deskripsi</label>
                                                <div class="col-sm-9">
                                                    <textarea id="ckeditor-classic" name="deskripsi"><?php echo $produk['deskripsi']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-9">                                                    
                                                    <div>
                                                        <button type="submit" class="btn btn-warning w-md">Edit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
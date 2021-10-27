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
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/umkm">UMKM</a></li>
                                            <li class="breadcrumb-item active">Tambah</li>
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
                                        <h4 class="card-title">Tambah Kategori</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/produk/tambah_aksi">
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="nama" class="form-control" id="horizontal-firstname-input" placeholder="Nama">
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
                                                        <option value="<?php echo $a['id']; ?>"><?php echo $a['nama']; ?></option>
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
                                                        <option value="<?php echo $b['id']; ?>"><?php echo $b['nama']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Harga</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="harga" class="form-control" id="horizontal-firstname-input" placeholder="Nama">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Stok</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="stok" class="form-control" id="horizontal-firstname-input" placeholder="Nama">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Gambar</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control-file"  name="gambar" id="exampleFormControlFile1">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Deskripsi</label>
                                                <div class="col-sm-9">
                                                    <textarea id="ckeditor-classic" name="deskripsi"></textarea>
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-9">                                                    
                                                    <div>
                                                        <button type="submit" class="btn btn-success w-md">Tambah</button>
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
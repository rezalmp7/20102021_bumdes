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
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/kategori">Kategori</a></li>
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
                                        <h4 class="card-title">Edit Kategori</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo base_url(); ?>admin/kategori/edit_aksi">
                                            <input type="hidden" name="id" value="<?php echo $kategori['id']; ?>">
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="nama" class="form-control" id="horizontal-firstname-input" placeholder="Nama" value="<?php echo $kategori['nama']; ?>">
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
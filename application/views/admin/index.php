            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Kategori <a href="<?= site_url('admin/tambah_kategori');?>" class="btn btn-primary">Tambah</a></h4>
                            </div>
                            <div class="col-sm-8 col-xl-6">
                            </div>
                        </div>

                        <!-- content -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="basic-datatable" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Penjelasan</th>
                                                    <th>Soal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <?php 
                                                $no = 1;
                                                foreach ($kategori as $k) {?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $k->nama_kategori; ?></td>
                                                    <td><?= character_limiter(htmlspecialchars_decode($k->persyaratan),20).'...'; ?></td>
                                                    <td><a href="<?= site_url('admin/soal_kategori/'.$k->id_kategori);?>" class="btn btn-sm btn-success">soal</a></td>
                                                    <td><a href="<?= site_url('admin/edit_kategori/'.$k->id_kategori);?>" class="btn btn-sm btn-warning">edit</a> <a href="<?= site_url('admin/hapus_kategori/'.$k->id_kategori);?>" class="btn btn-sm btn-danger">hapus</a></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                        </div>
                    </div>
                </div> <!-- content -->

                

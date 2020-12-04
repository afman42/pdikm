            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Soal Kategori <a href="<?= site_url('admin/tambah_soal_kategori/'.$kategori->id_kategori);?>" class="btn btn-primary">Tambah</a></h4>
                            </div>
                            <div class="col-sm-8 col-xl-6">
                            </div>
                        </div>

                        <!-- content -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <p class="sub-header">Survei <?= $kategori->nama_kategori; ?></p>
                                        <table id="basic-datatable" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pertanyaan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <?php 
                                                $no = 1;
                                                foreach ($soal_kategori as $k) {?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $k->soal; ?></td>
                                                    <td><a href="<?= site_url('admin/edit_soal_kategori/'.$k->id_soal);?>" class="btn btn-sm btn-warning">edit</a> <a href="<?= site_url('admin/hapus_soal_kategori/'.$k->id_soal);?>" class="btn btn-sm btn-danger">hapus</a></td>
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

                

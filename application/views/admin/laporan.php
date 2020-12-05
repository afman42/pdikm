            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Laporan</h4>
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
                                                    <th>Status</th>
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
                                                    <td>
                                                    <?php 
                                                    if ($k->status == 0) {
                                                        echo 'Aktif';
                                                    }
                                                    if ($k->status == 1) {
                                                        echo 'Tidak Aktif';
                                                    }
                                                    ?>
                                                    </td>
                                                    <td><a href="<?= site_url('admin/cek_laporan/'.$k->id_kategori);?>" class="btn btn-sm btn-success">Laporan</a></td>
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

                

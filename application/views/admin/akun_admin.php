            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-4">
                                <h4 class="mb-1 mt-0">Akun Admin</h4>
                            </div>
                            <div class="col-sm-4 col-xl-6"></div>
                            <div class="col-sm-4 col-xl-2">
                            	<a href="<?= site_url('admin/tambah_akun_admin');?>" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>

                        <!-- content -->
                        <div class="row">
                            <div class="col-12">
                            <div class="alert alert-primary" role="alert">
                                  <h3 style="color:white;">Untuk Password Admin Biasa : admin123</h3>
                            </div>
                                <div class="card">
                                    <div class="card-body">
                                        <table id="basic-datatable" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Usia</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <?php 
                                                $no = 1;
                                                foreach ($admin as $k) {?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $k->nama; ?></td>
                                                    <td><?= $k->username; ?></td>
                                                    <td><?= $k->umur; ?></td>
                                                    <td>
                                                    	<?php if ($this->session->id_admin == $k->id_admin): ?>
                                                    	Tidak Memiliki Hak Akses
                                                    	<?php else: ?>
                                                    		<a href="<?= site_url('admin/cek_akun_admin/'.$k->id_admin);?>" class="btn btn-sm btn-info">Detail</a>
                                                    		<a href="<?= site_url('admin/hapus_akun_admin/'.$k->id_admin);?>" class="btn btn-sm btn-danger">Hapus</a>
                                                    	<?php endif ?>
                                                    </td>
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

                

<div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Tambah Akun Admin</h4>
                            </div>
                            <div class="col-sm-8 col-xl-6">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <?php if (isset($error)) {?>
                                            <?= $error; ?>
                                        <?php }?>
                                        <form action="<?= site_url('admin/tambah_akun_admin');?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama">
                                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" name="username" placeholder="Masukan Username">
                                                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pekerjaan</label>
                                                        <?php select_pekerjaan(); ?>
                                                        <?= form_error('pekerjaan', '<small class="text-danger">', '</small>'); ?>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Foto</label>
                                                        <input type="file" name="foto" class="form-control">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-sm btn-primary" value="Kirim">       
                                                    </div>
            
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tgl_lahir" placeholder="Masukan Tanggal Lahir">
                                            <?= form_error('tgl_lahir', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukan Tempat Lahir">
                                            <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Pendidikan</label>
                                            <?php select_jenis_pendidikan(); ?>
                                            <?= form_error('jenis_pendidikan', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <?php select_jenis_kelamin(); ?>
                                            <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Umur</label>
                                            <input type="number" name="umur" class="form-control" placeholder="Masukan Umur">
                                            <?= form_error('umur', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- content -->

                

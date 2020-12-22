<div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Ubah Biodata</h4>
                            </div>
                            <div class="col-sm-8 col-xl-6">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                    <?php if (isset($_SESSION['message'])) {?>
                                            <?= $_SESSION['message'] ?>
                                        <?php } ?>
                                        <?php if (isset($error)) {?>
                                            <?= $error; ?>
                                        <?php }?>
                                        <form action="<?= site_url('admin/ubah_biodata');?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama" value="<?= $user->nama; ?>">
                                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" name="username" placeholder="Masukan Username" value="<?= $user->username; ?>">
                                                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control" name="new_password" placeholder="Masukan Password">
                                                        <?= form_error('new_password', '<small class="text-danger">', '</small>'); ?>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Password Ulang</label>
                                                        <input type="password" class="form-control" name="repeat_password" placeholder="Masukan Password Ulang">
                                                        <?= form_error('repeat_password', '<small class="text-danger">', '</small>'); ?>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Foto</label>
                                                        <input type="file" name="foto" class="form-control">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-sm btn-primary" value="Kirim">       
                                                    </div>
                                        </form>
            
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        if ($user->foto != null) {
                                        ?>
                                        <img src="<?= base_url().$user->foto;?>" alt="Photo Profil" width="450" height="450">
                                        <?php } else { ?>
                                            <h4>Foto Kosong</h4>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- content -->

                

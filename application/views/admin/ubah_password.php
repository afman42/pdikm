<div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Ubah Password</h4>
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
                                        <form action="<?= site_url('admin/ubah_password');?>" class="form-horizontal" method="post">
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
                                                        <input type="submit" class="btn btn-sm btn-primary" value="Kirim">       
                                                    </div>
                                        </form>
            
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                        </div>
                    </div>
                </div> <!-- content -->

                

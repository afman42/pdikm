<div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Tambah Kategori</h4>
                            </div>
                            <div class="col-sm-8 col-xl-6">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?= site_url('admin/update_kategori/'.$kategori->id_kategori);?>" class="form-horizontal" method="post">
                                                    <div class="form-group">
                                                        <label>Nama Kategori</label>
                                                        <input type="text" class="form-control" name="nama" required value="<?= $kategori->nama_kategori; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Penjelasan</label>
                                                        <textarea id="post-content" name="penjelasan"><?= $kategori->persyaratan; ?></textarea>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Status</label><br>
                                                        <input type="radio" name="status" value="0" <?php if($kategori->status == 0) echo 'checked'; ?>>Aktif
                                                        <input type="radio" name="status" value="1" <?php if($kategori->status == 1) echo 'checked'; ?>>Tidak Aktif
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

                

            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Laporan Per Bulan</h4>
                            </div>
                            <div class="col-sm-8 col-xl-6">
                            </div>
                        </div>

                        <!-- content -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?= site_url('lurah/cek_laporan_tahun');?>" method="get">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <select name='kategori' class="form-control" required>
                                                            <option value="">-- Pilih Kategori --</option>
                                                            <?php foreach ($kategori as $k): ?>
                                                                <option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                      </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <select name='tahun' class="form-control" required>
                                                            <option value="">-- Pilih Tahun --</option>
                                                            <?php
                                                            $thn_skr = date('Y');
                                                            for ($x = $thn_skr; $x >= 2015; $x--) {
                                                            ?>
                                                                <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                      </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Cari</button>
                                                </div>
                                            </div>   
                                        </form>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                        </div>
                    </div>
                </div> <!-- content -->

                

<div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                            <?php
                            if ($kategori->status == 0) {
                            ?>
                            <h4 class="mb-1 mt-0">Kategori Aktif <a href="<?= site_url('lurah/index');?>" class='btn btn-sm btn-primary'>kembali</a></h4>                            
                            <?php } else { ?>
                                <h4 class="mb-1 mt-0">Kategori Non Aktif <a href="<?= site_url('lurah/index');?>" class='btn btn-sm btn-primary'>kembali</a></h4>
                            <?php } ?>
                            </div>
                            <div class="col-sm-8 col-xl-6">
                            </div>
                        </div>

                        <!-- content -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <h5 class="card-title"><?= $kategori->nama_kategori; ?></h5>
                                    <p class="card-text"><?= htmlspecialchars_decode($kategori->persyaratan); ?></p>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <?php foreach ($soal as $s) { ?>
                                        <p class="soal"> <?= $start++ . ". " . $s->soal ?></p>
                                        <input type="radio" value="1" name="jawaban<?= $start_soal ?>" required> <label>&nbsp;<?= $s->jawaban1 ?></label><br>
                                        <input type="radio" value="2" name="jawaban<?= $start_soal ?>"> <label>&nbsp;<?= $s->jawaban2 ?></label><br>
                                        <input type="radio" value="3" name="jawaban<?= $start_soal ?>"> <label>&nbsp;<?= $s->jawaban3 ?></label><br>
                                        <input type="radio" value="4" name="jawaban<?= $start_soal++ ?>"> <label>&nbsp;<?= $s->jawaban4 ?></label>
                                    <?php } ?>
                                    <br><br>
                                    <label>Komentar</label>
                                    <textarea name="komentar" class="form-control" placeholder="Isikan Komentar anda disini" disabled></textarea>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                        </div>
                    </div>
                </div> <!-- content -->

                

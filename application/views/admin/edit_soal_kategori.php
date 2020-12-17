<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row page-title align-items-center">
                <div class="col-sm-4 col-xl-6">
                    <h4 class="mb-1 mt-0">Edit Soal Kategori</h4>
                </div>
                <div class="col-sm-8 col-xl-6">
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= site_url('admin/update_soal_kategori/' . $soal->id_soal); ?>" class="form-horizontal" method="post">
                                <div class="form-group">
                                    <label>Pertanyaan</label>
                                    <textarea name="soal" class="form-control" required placeholder="Masukan Soal"><?= $soal->soal ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Jawaban 1</label>
                                    <input type="text" class="form-control" name="jawaban1" required placeholder="Masukan Jawaban 1" value="<?= $jawaban->jawaban1; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Jawaban 2</label>
                                    <input type="text" class="form-control" name="jawaban2" required placeholder="Masukan Jawaban 2" value="<?= $jawaban->jawaban2; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Jawaban 3</label>
                                    <input type="text" class="form-control" name="jawaban3" required placeholder="Masukan Jawaban 3" value="<?= $jawaban->jawaban3; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Jawaban 4</label>
                                    <input type="text" class="form-control" name="jawaban4" required placeholder="Masukan Jawaban 4" value="<?= $jawaban->jawaban4; ?>">
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
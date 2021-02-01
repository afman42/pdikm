<style>
    .judul {
        font-weight: bold;
        font-size: 1.2em;
        margin-bottom: 0;

    }

    .judul h5 {
        font-size: 20px;
        margin-bottom: 5px;
    }

    .title-card {
        padding-bottom: 0px;
    }

    input {
        margin-left: 10px;
    }

    .soal {
        margin-bottom: 5px;
    }

    textarea {
        width: 45%;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12 text-center judul">
                    <h5>SURVEI</h5>
                    <p>Pelayanan Bimbingan Teknis</p>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="card card-default">
                <div class="card-header">
                    <h4 class="text-center title-card">
                        Pertanyaan
                    </h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="<?= site_url('beranda/simpan_jawaban') ?>" method="POST">
                        <input type="hidden" name="id_kategori" value="<?= $this->uri->segment(3) ?>">
                        <?php foreach ($soal as $s) { ?>
                            <p class="soal"> <?= $start++ . ". " . $s->soal ?></p>
                            <input type="radio" value="1" name="jawaban<?= $start_soal ?>" required> <label>&nbsp;<?= $s->jawaban1 ?></label><br>
                            <input type="radio" value="2" name="jawaban<?= $start_soal ?>"> <label>&nbsp;<?= $s->jawaban2 ?></label><br>
                            <input type="radio" value="3" name="jawaban<?= $start_soal ?>"> <label>&nbsp;<?= $s->jawaban3 ?></label><br>
                            <input type="radio" value="4" name="jawaban<?= $start_soal++ ?>"> <label>&nbsp;<?= $s->jawaban4 ?></label>
                        <?php } ?>
                        <br><br>
                        <label>Komentar</label>
                        <textarea name="komentar" class="form-control" placeholder="Isikan Komentar anda disini" required></textarea>

                </div>
                <!-- /.card-body -->
            </div>
            <div class="text-center pb-3">
                <input type="submit" class="btn btn-primary" onclick="peringatan()" value="Lanjut">
            </div>
            </form>
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
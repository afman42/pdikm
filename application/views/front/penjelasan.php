<style>
    .judul {
        font-weight: bold;
        font-size: 1.2em;
        margin-bottom: 0;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12 text-center judul">
                    <p>SURVEI</p>
                    <p>Pelayanan Bimbingan Teknis</p>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info"></i>
                        Penjelasan Setiap Komponen Pertanyaan
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <article>
                        <?=
                            htmlspecialchars_decode($persyaratan);
                        ?>
                    </article>

                </div>
                <!-- /.card-body -->
            </div>
            <div class="text-center">
                <?php if ($this->session->login != TRUE): ?>
                    <a href="<?= site_url('beranda/responden/'.$id_kategori) ?>" class="btn btn-primary">Lanjut</a>
                <?php else: ?>
                    <a href="<?= site_url('beranda/login_masyarakat') ?>" class="btn btn-primary">Lanjut</a>
                <?php endif ?>
            </div>

        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
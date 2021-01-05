<style>
    .btn-size {
        width: 100%;
        height: 100%;
    }

    .col-md-3 {
        margin-top: 10px;
    }

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
                <div class="col-sm-12 text-center">
                    <p class="judul">KATEGORI SURVEI</p>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <?php foreach ($kategori as $kat) { ?>
                                    <div class="col-md-3">
                                        <div class="card card-body">
                                            <a href="<?= site_url('beranda/penjelasan/' . $kat->id_kategori) ?>" class="btn btn-lg btn-block btn-primary btn-size">
                                                <i class="fas fa-poll fa-2x"></i>
                                                <h6 class=""><?= $kat->nama_kategori ?></h6>
                                            </a>
                                            <button onclick="window.location.href='<?= site_url('beranda/hasil/'.$kat->id_kategori) ?>'" class="btn btn-success mt-2">Lihat Hasil</button>
                                        </div>

                                    </div>
                                <?php  } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          
        </div><!-- /.card -->
    </div>
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
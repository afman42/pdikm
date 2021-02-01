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

    .float-button-wrapper {
        position: fixed;
        right: 80px;
        bottom: 150px;
    }

    .float-button-wrapper p {
        left: 15px;
        font-size: 11px;
        margin-bottom: 3px;
    }

    .float-button-page img {
        background: none;
        border: none;
        padding: 0;
        margin: 0;
    }

    .float-button-page button {
        float: left;
        clear: left;
        margin-bottom: 1px;
    }

    .float-button-page a:hover img {
        background-color: #f1f1f1;
        filter: alpha(opacity=50);
        -moz-opacity: 0.5;
        -khtml-opacity: 0.5;
        opacity: 0.5;
    }

    .float-button-page {
        position: absolute;
        background: none;
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
                                            <button onclick="window.location.href='<?= site_url('beranda/hasil/' . $kat->id_kategori) ?>'" class="btn btn-success mt-2">Lihat Hasil</button>
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
<div style="overflow:auto">
    <div class="float-button-wrapper">
        <div class="float-button-page">
            <?php if ($this->session->userdata('id')) { ?>
                <a href="<?= site_url('beranda/logout') ?>" class="btn btn-danger">Keluar</a>
            <?php  } else { ?>

                <button data-toggle="modal" data-target=".masuk" class="btn btn-primary">Masuk</button>
                <button data-toggle="modal" data-target=".daftar" class="btn btn-primary">Daftar</button>

            <?php }

            ?>

        </div>
    </div>
</div>


<div class="modal fade masuk" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('beranda/cek_login') ?>">
                    <div class="form-group">
                        <label class="col-form-label">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Masuk</button>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade daftar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mendaftar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('beranda/simpan_user') ?>">
                <input type="hidden" value="<?= $kode ?>" name="id_masyarakat">
                    <div class="row">
                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>NIK / STNK / SIM</label>
                                <input type="text" class="form-control" name="nik" placeholder="Nomor NIK/STNK/SIM" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Umur</label>
                                <input type="text" class="form-control" name="umur" placeholder="Umur" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="" required>
                                    <option value="" disabled selected>-- Pilih --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Pendidikan Terakhir</label>
                                <select name="pendidikan" id="" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih --</option>
                                    <option value="SMA/SMK">SMA/SMK</option>
                                    <option value="D1-D3-D4">D1-D3-D4</option>
                                    <option value="Sarjana (S1)">Sarjana (S1)</option>
                                    <option value="Master (S2) Keatas">Master (S2) Keatas</option>
                                </select>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                    <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <select name="pekerjaan" id="" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih --</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Wiraswasta/Usahawan">Wiraswasta/Usahawan</option>
                                    <option value="TNI/Polri">TNI/Polri</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Pegawai">Pegawai</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </div>
                    </div>



                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $this->session->userdata('msg') <> '' ? $this->session->userdata('msg') : ''; ?>
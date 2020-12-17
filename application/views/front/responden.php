<style>
    .judul {
        font-weight: bold;
        font-size: 1.2em;
        margin-bottom: 0;
    }

    .card-judul {
        font-size: 1.3em;
    }

    .form-check {
        padding-left: 30px;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12 text-center judul">
                    <p>Responden</p>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header text-center">
                            <h3 class="card-judul">
                                Formulir Responden
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <form method="POST" action="<?= site_url('beranda/simpan_responden') ?>">
                                        <input type="hidden" name="id_kategori" value="<?= $id_kategori ?>">
                                        <input type="hidden" name="id_responden" value="<?= $auto_kode ?>">
                                        <div class="form-group row">
                                            <div class="input-group mb-1">
                                                <label class="col-sm-4 col-form-label">Nama Lengkap</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="input-group mb-1">
                                                <label class="col-sm-4 col-form-label">NIP/Data Lain</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                </div>
                                                <input type="text" name="nip" class="form-control" placeholder="NIP/Data lain" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="input-group mb-1">
                                                <label class="col-sm-4 col-form-label">Umur</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                                </div>
                                                <input type="text" name="umur" class="form-control" placeholder="cth: 25" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="input-group mb-1">
                                                <label class="col-sm-4 col-form-label">Tanggal</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                                <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group mb-1">
                                                <div class="col-sm-4">
                                                    <label>Jenis Kelamin</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" required>
                                                        <label class="form-check-label">Laki-laki</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
                                                        <label class="form-check-label">Perempuan</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="input-group mb-1">
                                                <div class="col-sm-4">
                                                    <label>Pendidikan Terakhir</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_pendidikan" value="SMA Kebawah" required>
                                                        <label class="form-check-label">SMA Kebawah</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_pendidikan" value="D1-D3-D4">
                                                        <label class="form-check-label">D1-D3-D4</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_pendidikan" value="Sarjana(S1)">
                                                        <label class="form-check-label">Sarjana(S1)</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_pendidikan" value="Master(S2) Keatas">
                                                        <label class="form-check-label">Master(S2) Keatas</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="input-group mb-1">
                                                <div class="col-sm-4">
                                                    <label>Pekerjaan Utama</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pekerjaan" value="PNS" required>
                                                        <label class="form-check-label">PNS</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pekerjaan" value="Wiraswasta/Usahawan">
                                                        <label class="form-check-label">Wiraswasta/Usahawan</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pekerjaan" value="TNI/Polri">
                                                        <label class="form-check-label">TNI/Polri</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pekerjaan" value="Mahasiswa">
                                                        <label class="form-check-label">Mahasiswa</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pekerjaan" value="Pegawai">
                                                        <label class="form-check-label">Pegawai</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pekerjaan" value="Lain-lain">
                                                        <label class="form-check-label">Lain-lain</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                </div>

                                <div class="col-md-2"></div>
                            </div>

                        </div>

                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="text-center pb-3">
                <input type="submit" class="btn btn-primary" onclick="peringatan()" value="Lanjutkan">
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

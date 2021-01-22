            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-4">
                                <h4 class="mb-1 mt-0">Cek Akun Masyarakat</h4>
                            </div>
                            <div class="col-sm-4 col-xl-6"></div>
                            <div class="col-sm-4 col-xl-2">
                                <a class="btn btn-danger hapus_button">Hapus Akun</a>
                            </div>
                        </div>

                        <!-- content -->
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Nama</td>
                                                <td><?= $masyarakat->nama;?></td>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td><?= $masyarakat->jenis_kelamin;?></td>
                                            </tr>
                                            <tr>
                                                <td>Usia</td>
                                                <td><?= $masyarakat->umur;?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Pendidikan</td>
                                                <td><?= $masyarakat->jenis_pendidikan;?></td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan</td>
                                                <td><?= $masyarakat->pekerjaan;?></td>
                                            </tr>
                                        </table>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Foto :</h4>
                                        <a href="<?= base_url().$masyarakat->foto;?>" data-lightbox="image-1" data-title="Foto Diri">
                                            <img src="<?= base_url().$masyarakat->foto;?>" class="img-fluid">
                                        </a>
                                        <h4>Foto KTP :</h4>
                                        <a href="<?= base_url().$masyarakat->foto;?>" data-lightbox="image-2" data-title="Foto KTP/SIM/STNK">
                                            <img src="<?= base_url().$masyarakat->foto_ktp;?>" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- content -->

                

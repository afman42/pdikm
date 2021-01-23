            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-4">
                                <h4 class="mb-1 mt-0">Cek Akun Admin</h4>
                            </div>
                            <div class="col-sm-4 col-xl-6"></div>
                            <div class="col-sm-4 col-xl-2">
                                <!-- <a class="btn btn-danger hapus_button">Hapus Akun</a> -->
                            </div>
                        </div>

                        <!-- content -->
                        <div class="row">
                            <div class="col-6">
                            	<div class="alert alert-primary" role="alert">
								  <h4>Pengguna</h4>
								</div>
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Nama</td>
                                                <td><?= $admin->nama;?></td>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td><?= $admin->jenis_kelamin;?></td>
                                            </tr>
                                            <tr>
                                                <td>Usia</td>
                                                <td><?= $admin->umur;?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Pendidikan</td>
                                                <td><?= $admin->jenis_pendidikan;?></td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan</td>
                                                <td><?= $admin->pekerjaan;?></td>
                                            </tr>
                                        </table>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                            <div class="col-6">
                            	<div class="alert alert-primary" role="alert">
								  <h4>Foto</h4>
								</div>
                                <div class="card">
                                    <div class="card-body">
                                        <a href="<?= base_url().$admin->foto;?>" data-lightbox="image-1" data-title="Foto Diri">
                                            <img src="<?= base_url().$admin->foto;?>" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- content -->

                

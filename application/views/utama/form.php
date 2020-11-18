<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <title><?= $header; ?></title>
</head>
<body>
<?php include 'navbar.php'; ?>
<center><h3>Form Responden</h3></center>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <table height="500">
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td width="10%"></td>
                                    <td><input type="text" name="nama_lengkap" class="form-control" placeholder="Masukan Nama Lengkap"></td>
                                </tr>
                                <tr>
                                    <td>NIP</td>
                                    <td></td>
                                    <td><input type="text" name="nip" class="form-control" placeholder="Masukan NIP"></td>
                                </tr>
                                <tr>
                                    <td>Umur</td>
                                    <td></td>
                                    <td><input type="text" name="umur" class="form-control" placeholder="Masukan Umur"></td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td></td>
                                    <td><input type="date" name="tanggal" class="form-control" placeholder="Masukan Tanggal"></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td></td>
                                    <td>
                                        <input type="radio" name="jk">Laki - Laki <br>
                                        <input type="radio" name="jk">Perempuan
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pendidikan Terakhir</td>
                                    <td></td>
                                    <td>
                                        <input type="radio" name="pdk">SMA Kebawah <br>
                                        <input type="radio" name="pdk">D1-D2-D3-D4 <br>
                                        <input type="radio" name="pdk">Sarjana (S1) <br>
                                        <input type="radio" name="pdk">Master (S2)keatas <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Utama</td>
                                    <td></td>
                                    <td>
                                        <input type="radio" name="pdu">Mahasiswa <br>
                                        <input type="radio" name="pdu">PNS <br>
                                        <input type="radio" name="pdu">TNI/POLRI <br>
                                        <input type="radio" name="pdu">Wiraswasta <br>
                                        <input type="radio" name="pdu">Dan Lain - Lain <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><a href="#" class="btn btn-primary">Selanjutnya</a></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
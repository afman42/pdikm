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
<center><h3>Survei</h3></center>
<center><h3>Nama Survei</h3></center>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header" style="background-color:#edf7c3;">
                    <center>Pertanyaan</center>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th colspan="4">1.Awowkwkw</th>
                        </tr>
                        <tr>
                            <td><input type="radio" name="jawaban1"> Sangat Tidak Puas</td>
                            <td><input type="radio" name="jawaban1"> Tidak Puas</td>
                            <td><input type="radio" name="jawaban1"> Puas</td>
                            <td><input type="radio" name="jawaban1"> Sangat Puas</td>
                        </tr>
                    </table>
                    <div class="form-group">
                        <div class="bg-secondary text-white"><label>&nbsp;&nbsp;&nbsp;Komentar dan Saran</label></div>
                        <textarea class="form-control" col="4" rows="4" name="komentar"></textarea>
                    </div>
                    <center><a href="#" class="btn btn-primary">Selanjutnya</a></center>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
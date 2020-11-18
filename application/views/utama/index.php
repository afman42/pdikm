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
<center><h1>Kategori Survei</h1></center>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-lg-4">
                                    <i class="uil-files-landscapes p-3" style="font-size:50px;"></i>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <p class="card-text">This is a wider card with supporting text </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
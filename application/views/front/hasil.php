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
                    <p class="judul">HASIL SURVEI</p>
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
                    <div class="card card-danger">
                        <div class="card-header">
                           

                            
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Grade</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>ID</th>
                                        <th>ID RESPONDEN</th>
                                   
                                        <th>HASIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sangat_baik = 0;;
                                    $baik = 0;;
                                    $kurang_baik = 0;;
                                    $tidak_baik = 0;;
                                    $start = 0;
                                    foreach ($jawaban as $a) {
                                        $jawaban1 = $a->jawaban1;
                                        $jawaban2 = $a->jawaban2;
                                        $jawaban3 = $a->jawaban3;
                                        $jawaban4 = $a->jawaban4;
                                        $jawaban5 = $a->jawaban5;
                                        $jawaban6 = $a->jawaban6;
                                        $jawaban7 = $a->jawaban7;
                                        $jawaban8 = $a->jawaban8;
                                        $hasil = ($jawaban1 + $jawaban2 + $jawaban3+$jawaban4+$jawaban5+$jawaban6+$jawaban7+$jawaban8) / 8;



                                    ?>

                                        <tr>
                                            <td><?= ++$start ?></td>
                                            <td><?= $a->id_jawaban_user ?></td>
                                            <td><?= $a->id_responden ?></td>
                                            <td>
                                                <?php if ($hasil == 1 || $hasil < 2) {
                                                    $sangat_baik++;
                                                    $grade = "Sangat Baik";
                                                    echo $grade;
                                                } else if ($hasil == 2  || $hasil < 3) {
                                                    $baik++;

                                                    $grade =  "Baik";
                                                    echo $grade;
                                                } else if ($hasil == 3  || $hasil < 4) {
                                                    $kurang_baik++;

                                                    $grade =  "Kurang Baik";
                                                    echo $grade;
                                                } else {
                                                    $tidak_baik++;

                                                    $grade =  "Tidak Baik";
                                                    echo $grade;
                                                }





                                                ?>
                                            </td>

                                        </tr>

                                    <?php }

                                    ?>
                                    <p>Grade Sangat Baik = <?= $sangat_baik ?></p>
                                    <p>Grade Baik = <?= $baik ?></p>
                                    <p>Grade Kurang Baik = <?= $kurang_baik ?></p>
                                    <p>Grade Tidak Baik = <?= $tidak_baik ?></p>
                                    <?php 
                                        $total = $sangat_baik+$baik+$kurang_baik+$tidak_baik;
                                    ?>
                                    <br>
                                    <p><b> TOTAL RESPONDEN : <?= $total ?></b></p>


                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

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

<script src="<?= base_url()  ?>assets/lte/plugins/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()  ?>assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()  ?>assets/lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url()  ?>assets/lte/dist/js/demo.js"></script>

<!-- OPTIONAL SCRIPTS -->
<!-- ChartJS -->
<script src="<?= base_url()  ?>assets/lte/plugins/chart.js/Chart.min.js"></script>
<!-- /.content-wrapper -->
<script>
    $(function() {

        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                'Tidak baik',
                'Kurang Baik',
                'Baik',
                'Sangat Baik'

            ],
            datasets: [{
                data: [<?= $tidak_baik ?>, <?= $kurang_baik ?>, <?= $baik ?>, <?= $sangat_baik ?>],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

    })
</script>
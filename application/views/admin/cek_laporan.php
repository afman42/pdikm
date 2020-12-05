            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Laporan <?= $kategori->nama_kategori; ?></h4>
                            </div>
                            <div class="col-sm-8 col-xl-6">
                            </div>
                        </div>

                        <!-- content -->
                        <?php if ($responden->num_rows() > 0) {?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th> <center>No</center></th>
                                                <th><center>Nama Responden</center></th>
                                                <th> <center>Pendidikan</center></th>
                                                <th> <center>Pekerjaan</center></th>
                                                <th> <center>Jenis Kelamin</center></th>
                                                <th> <center>Umur</center></th>
                                                <th> <center>Waktu</center></th>
                                                <th><center>RL-1</center></th>
                                                <th><center>RL-2</center></th>
                                                <th><center>RL-3</center></th>
                                                <th><center>RL-4</center></th>
                                                <th><center>RL-5</center></th>
                                                <th><center>RL-6</center></th>
                                                <th><center>RL-7</center></th>
                                                <th><center>RL-8</center></th>
                                                <th><center>RL-9</center></th>
                                                <th><center>RL-10</center></th>
                                            </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <?php 
                                                $no = 1;
                                                foreach ($join_responden as $k) {?>
                                                <?php 
                                                if ($k->jenis_kelamin == 1) {
                                                    $jkl = 'L';
                                                } else {
                                                    $jkl = 'P';
                                                }
                                                ?>
                                                <tr>
                                                    <td><center><?= $no++;?></center></td>
                                                    <td><?= $k->nama;?></td>
                                                    <td><center><?= $k->jenis_pendidikan;?></center></td>
                                                    <td><?= $k->pekerjaan;?></td>
                                                    <td><center><?= $jkl;?></center></td>
                                                    <td><center><?= $k->umur;?></center></td>
                                                    <td><center><?= $k->tanggal;?></center></td>
                                                    <td><center><?= $k->jawaban1;?></center></td>
                                                    <td><center><?= $k->jawaban2;?></center></td>
                                                    <td><center><?= $k->jawaban3;?></center></td>
                                                    <td><center><?= $k->jawaban4;?></center></td>
                                                    <td><center><?= $k->jawaban5;?></center></td>
                                                    <td><center><?= $k->jawaban6;?></center></td>
                                                    <td><center><?= $k->jawaban7;?></center></td>
                                                    <td><center><?= $k->jawaban8;?></center></td>
                                                    <td><center><?= $k->jawaban9;?></center></td>
                                                    <td><center><?= $k->jawaban10;?></center></td>
                                                </tr>
                                                <?php } ?>
                                                <?php
                                $queryj = $this->db->query("SELECT  COUNT(*) AS jumlah FROM responden join jawaban_user where id_kategori='$kategori->id_kategori' AND id_responden=id_responden")->row();
                                $count= $queryj->jumlah;
                                $queryv =$this->db->query("SELECT * FROM responden join jawaban_user where id_kategori='$kategori->id_kategori' AND id_responden=id_responden");

                                $jawaban1=0;$jawaban2=0;$jawaban3=0;$jawaban4=0;$jawaban5=0;$jawaban6=0;$jawaban7=0;$jawaban8=0;$jawaban9=0;$jawaban10=0;
                                // while ( $datav = mysqli_fetch_array($queryv) ) {
                                    foreach ($queryv->result_array() as $datav) {
                                        $jawaban1=$jawaban1+$datav['jawaban1'];
                                        $jawaban2=$jawaban2+$datav['jawaban2'];
                                        $jawaban3=$jawaban3+$datav['jawaban3'];
                                        $jawaban4=$jawaban4+$datav['jawaban4'];
                                        $jawaban5=$jawaban5+$datav['jawaban5'];
                                        $jawaban6=$jawaban6+$datav['jawaban6'];
                                        $jawaban7=$jawaban7+$datav['jawaban7'];
                                        $jawaban8=$jawaban8+$datav['jawaban8'];
                                        $jawaban9=$jawaban9+$datav['jawaban9'];
                                        $jawaban10=$jawaban10+$datav['jawaban10'];
                                    }?>
                                    <?php
                                        $average1=$jawaban1/$count;
                                        $average2=$jawaban2/$count;
                                        $average3=$jawaban3/$count;
                                        $average4=$jawaban4/$count;
                                        $average5=$jawaban5/$count;
                                        $average6=$jawaban6/$count;
                                        $average7=$jawaban7/$count;
                                        $average8=$jawaban8/$count;
                                        $average9=$jawaban9/$count;
                                        $average10=$jawaban10/$count;
                                    ?>
                                    <tr>
                                    <th>
                                            <td><b> NRR</b></td>
                                            <td><b> </b></td>
                                            <td><b> </b></td>
                                            <td><b> </b></td>
                                            <td><b> </b></td>
                                            <td><b> </b></td>
                                            <td><center><b><?php echo number_format( $average1,2);?></b></center></td>
                                            <td><center><b><?php echo number_format( $average2,2);?></b></center></td>
                                            <td><center><b><?php echo number_format( $average3,2);?></b></center></td>
                                            <td><center><b><?php echo number_format( $average4,2);?></b></center></td>
                                            <td><center><b><?php echo number_format( $average5,2);?></b></center></td>
                                            <td><center><b><?php echo number_format( $average6,2);?></b></center></td>
                                            <td><center><b><?php echo number_format( $average7,2);?></b></center></td>
                                            <td><center><b><?php echo number_format( $average8,2);?></b></center></td>
                                            <td><center><b><?php echo number_format( $average9,2);?></b></center></td>
                                            <td><center><b><?php echo number_format( $average10,2);?></b></center></td>
                                          
                                        </th>  
                                    </tr
                                    <tr>
                                        <th>
                                         <td><b> NRR Tertimbang</b></td>
                                         <td><b> </b></td>
                                         <td><b> </b></td>
                                         <td><b> </b></td>
                                         <td><b> </b></td>
                                         <td><b> </b></td>
                                         <td><center><b><?php echo number_format(($average1=$average1*0.125),2);?></b></center></td>
                                         <td><center><b><?php echo number_format(($average2=$average2*0.125),2);?></b></center></td>
                                         <td><center><b><?php echo number_format(($average3=$average3*0.125),2);?></b></center></td>
                                         <td><center><b><?php echo number_format(($average4=$average4*0.125),2);?></b></center></td>
                                         <td><center><b><?php echo number_format(($average5=$average5*0.125),2);?></b></center></td>
                                         <td><center><b><?php echo number_format(($average6=$average6*0.125),2);?></b></center></td>
                                         <td><center><b><?php echo number_format(($average7=$average7*0.125),2);?></b></center></td>
                                         <td><center><b><?php echo number_format(($average8=$average8*0.125),2);?></b></center></td>
                                         <td><center><b><?php echo number_format(($average9=$average9*0.125),2);?></b></center></td>
                                         <td><center><b><?php echo number_format(($average10=$average10*0.125),2);?></b></center></td>
                                        </th>  
                                    </tr>
                                            </tbody>
                                        </table>
                                        <?php $nrr=$average1+$average2+$average3+$average4+$average5+$average6+$average7+$average8+$average9+$average10; ?>
                                        <table width="100%" class="table table-striped table-bordered table-hover">
                                          <tr>
                                             <td width="61%"><b> Jumlah NRR IKM tertimbang </b></td>
                                             <td class="text-primary"><h4><center><b><?php echo number_format($nrr,2);?></b></center></h4>    </td>
                                        </tr>

                                        <tr>
                                             <td width="61%"><b>Nilai IKM (JML NRR IKM tertimbang *25) </b></td>
                                             <td class="text-primary"><h3><center><b><?php echo number_format(($ikm=$nrr*25),2);?></b></center></h3></td>                            
                                        </tbody>
                                    </table>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                        </div>
                        <?php }else{?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="alert alert-info">
                                                <strong>BELUM ADA JAWABAN RESPONDEN UNTUK KATEGORI INI !</strong>
                                            </div>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div><!-- end col -->
                            </div>
                        <?php } ?>
                    </div>
                </div> <!-- content -->

                
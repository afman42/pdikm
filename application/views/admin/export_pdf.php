<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-4aw5{background-color:#96fffb;text-align:left;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<style type="text/css">
.tgs  {border-collapse:collapse;border-spacing:0;}
.tgs td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tgs th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tgs .tg-c6of{background-color:#ffffff;border-color:inherit;text-align:left;vertical-align:top}
.tgs .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>
<?php 
$img_file = 'assets/images/kabupaten.jpg';

// Read image path, convert to base64 encoding
$imgData = base64_encode(file_get_contents($img_file));

// Format the image SRC:  data:{mime};base64,{data};
$src = 'data: '.mime_content_type($img_file).';base64,'.$imgData;

// Echo out a sample image
echo '<img src="'.$src.'">';

?>
                        <p><center><img src="<?= $_SERVER['DOCUMENT_ROOT'].'/pdikm/assets/images/kabupaten.jpg';?>" alt=""></center></p>
                        <p style="font-size:14;"><b>PENGOLAHAN INDEKS KEPUASAN MASYARAKAT PER RESPONDEN DAN PER RUANG LINGKUP PELAYANAN</b></p>
                        
						<table class="tg" width="100%">
                                <thead>
                                    <tr>
                                            <th class="tg-4aw5"> <center>No</center></th>
                                            <th class="tg-4aw5"><center>Nama Responden</center></th>
                                            <th class="tg-4aw5"> <center>Pendidikan</center></th>
                                            <th class="tg-4aw5"> <center>Pekerjaan</center></th>
                                            <th class="tg-4aw5"> <center>Jenis Kelamin</center></th>
                                            <th class="tg-4aw5"> <center>Umur</center></th>
                                            <th class="tg-4aw5"><center>Waktu</center></th>
                                            <th class="tg-4aw5"><center>RL-1</center></th>
                                            <th class="tg-4aw5"><center>RL-2</center></th>
                                            <th class="tg-4aw5"><center>RL-3</center></th>
                                            <th class="tg-4aw5"><center>RL-4</center></th>
                                            <th class="tg-4aw5"><center>RL-5</center></th>
                                            <th class="tg-4aw5"><center>RL-6</center></th>
                                            <th class="tg-4aw5"><center>RL-7</center></th>
                                            <th class="tg-4aw5"><center>RL-8</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                        <?php 
                                                $no=1; 
                                                foreach ($join_responden as $data ) {

                                                        $jk=$data['jenis_kelamin'];
                                                    ?>

                                                    <?php if($jk==1)
                                                        {?>
                                                        <?php 

                                                            $jkl="L";       

                                                        }else{?>
                                                        <?php 
                                                            $jkl="P";    
                                                        }?>

                                                    <?php
                                                echo '
                                                <tr>
                                                    <td class="tg-0lax"><center>'.$no++.'.</center></td>
                                                    <td class="tg-0lax">'.$data["nama"].'</td>
                                                    <td class="tg-0lax"><center>'.$data["jenis_pendidikan"].'</center></td>
                                                    <td class="tg-0lax">'.$data["pekerjaan"].'</td>
                                                    <td class="tg-0lax"><center>'.$jkl.'</center></td>
                                                    <td class="tg-0lax"><center>'.$data["umur"].'</center></td>
                                                    <td class="tg-0lax"><center>'.$data["tanggal"].'</center></td>
                                                    <td class="tg-0lax"><center>'.$data["jawaban1"].'</center></td>
                                                    <td class="tg-0lax"><center>'.$data["jawaban2"].'</center></td>
                                                    <td class="tg-0lax"><center>'.$data["jawaban3"].'</center></td>
                                                    <td class="tg-0lax"><center>'.$data["jawaban4"].'</center></td>
                                                    <td class="tg-0lax"><center>'.$data["jawaban5"].'</center></td>
                                                    <td class="tg-0lax"><center>'.$data["jawaban6"].'</center></td>
                                                    <td class="tg-0lax"><center>'.$data["jawaban7"].'</center></td>
                                                    <td class="tg-0lax"><center>'.$data["jawaban8"].'</center></td>
                                            </tr>
                                            ';
                                        }?>
                        <?php
                            $count=$jumlah['jumlah'];

                            $jawaban1=0;$jawaban2=0;$jawaban3=0;$jawaban4=0;$jawaban5=0;$jawaban6=0;$jawaban7=0;$jawaban8=0;
                            // while ( $datav = mysqli_fetch_array($queryv) ) {
                                foreach ($join_responden as $datav) {
                                    $jawaban1=$jawaban1+$datav['jawaban1'];
                                    $jawaban2=$jawaban1+$datav['jawaban2'];
                                    $jawaban3=$jawaban1+$datav['jawaban3'];
                                    $jawaban4=$jawaban1+$datav['jawaban4'];
                                    $jawaban5=$jawaban1+$datav['jawaban5'];
                                    $jawaban6=$jawaban1+$datav['jawaban6'];
                                    $jawaban7=$jawaban1+$datav['jawaban7'];
                                    $jawaban8=$jawaban1+$datav['jawaban8'];};
                    ?>
                                <?php
                                    $average1=$jawaban1/$count;
                                    $average2=$jawaban2/$count;
                                    $average3=$jawaban3/$count;
                                    $average4=$jawaban4/$count;
                                    $average5=$jawaban5/$count;
                                    $average6=$jawaban6/$count;
                                    $average7=$jawaban7/$count;
                                    $average8=$jawaban8/$count;
                                ?>
                            <tr>
                                <th>
                                        <td class="tg-0lax"><b> NRR</b></td>
                                        <td class="tg-0lax"><b> </b></td>
                                        <td class="tg-0lax"><b> </b></td>
                                        <td class="tg-0lax"><b> </b></td>
                                        <td class="tg-0lax"><b> </b></td>
                                        <td class="tg-0lax"><b> </b></td>
                                        <td class="tg-0lax"><center><b><?php echo number_format( $average1,2);?></b></center></td>
                                        <td class="tg-0lax"><center><b><?php echo number_format( $average2,2);?></b></center></td>
                                        <td class="tg-0lax"><center><b><?php echo number_format( $average3,2);?></b></center></td>
                                        <td class="tg-0lax"><center><b><?php echo number_format( $average4,2);?></b></center></td>
                                        <td class="tg-0lax"><center><b><?php echo number_format( $average5,2);?></b></center></td>
                                        <td class="tg-0lax"><center><b><?php echo number_format( $average6,2);?></b></center></td>
                                        <td class="tg-0lax"><center><b><?php echo number_format( $average7,2);?></b></center></td>
                                        <td class="tg-0lax"><center><b><?php echo number_format( $average8,2);?></b></center></td>
                                      
                                    </th>  
                                </tr

                                <tr>
                                    <th>
                                     <td class="tg-0lax"><b> NRR Tertimbang</b></td>
                                     <td class="tg-0lax"><b> </b></td>
                                     <td class="tg-0lax"><b> </b></td>
                                     <td class="tg-0lax"><b> </b></td>
                                     <td class="tg-0lax"><b> </b></td>
                                     <td class="tg-0lax"><b> </b></td>
                                     <td class="tg-0lax"><center><b><?php echo number_format(($average1=$average1*0.125),2);?></b></center></td>
                                     <td class="tg-0lax"><center><b><?php echo number_format(($average2=$average2*0.125),2);?></b></center></td>
                                     <td class="tg-0lax"><center><b><?php echo number_format(($average3=$average3*0.125),2);?></b></center></td>
                                     <td class="tg-0lax"><center><b><?php echo number_format(($average4=$average4*0.125),2);?></b></center></td>
                                     <td class="tg-0lax"><center><b><?php echo number_format(($average5=$average5*0.125),2);?></b></center></td>
                                     <td class="tg-0lax"><center><b><?php echo number_format(($average6=$average6*0.125),2);?></b></center></td>
                                     <td class="tg-0lax"><center><b><?php echo number_format(($average7=$average7*0.125),2);?></b></center></td>
                                     <td class="tg-0lax"><center><b><?php echo number_format(($average8=$average8*0.125),2);?></b></center></td>
                                    </th>  
                                </tr>
                                 </tbody>
                            </table>

                            <?php $nrr=$average1+$average2+$average3+$average4+$average5+$average6+$average7+$average8; ?>
                            
                              <table class="tg" width="100%">
                                <thead>
                                    <tr>
                                        <th class="tg-c6of" colspan="9"><b> Jumlah NRR IKM tertimbang </b></th>
                                        <th class="tg-c6of"><center><b><?php echo number_format($nrr,2);?></b></center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="9" class="tg-0pky"><center><b> Nilai IKM (JML NRR IKM tertimbang *25) </b> </center></td>
                                        <td class="tg-0pky"><center><b><?php echo number_format(($ikm=$nrr*25),2);?></b></center></td> 
                                    </tr>
                                </tbody>
                                </tbody>
                            </table>

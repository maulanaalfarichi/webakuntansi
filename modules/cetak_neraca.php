<?php 
	include "../config/koneksi.php";
	?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo $base_url;?>includes/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Laporan Neraca</title>
</head>

<body>
  
    <div class="dashboard-main-wrapper">
       
        
            
                <div class="container-fluid ">
                   
                    <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header p-4">
                                    <div class="float-right"> <h3 class="mb-0">Perdana Computer</h3>
                                    <h4 class="text-dark mb-1"><i>Laporan Neraca</i></h4>  
                                    </div>
                                </div>
                                <div class="card-body">                                
                                <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"  >  
                                        
                                                <tr>
                                                    <th colspan="2" class="left" width="50%"><u>Aktiva</u></th>
                                                </tr>
                                                <?php

                                                $kasd = mysqli_query($conn,"
                                                            SELECT SUM(kas.debit_kas) AS debk,
                                                            kas.tanggal_kas
                                                            FROM kas INNER JOIN bagan_akun ON kas.id_baganakun=bagan_akun.id_baganakun
                                                        ");
                                                    $kd = mysqli_fetch_array($kasd);

                                                    $kask = mysqli_query($conn,"
                                                            SELECT SUM(kas.kredit_kas) AS krek,
                                                            kas.tanggal_kas
                                                            FROM kas INNER JOIN bagan_akun ON kas.id_baganakun=bagan_akun.id_baganakun
                                                        ");
                                                    $kk = mysqli_fetch_array($kask);

                                                    $total_kas=$kd['debk']-$kk['krek'];

                                                
                                                    $sqlL = mysqli_query($conn,"SELECT SUM(jurnal_umum.debit_jurnalumum) AS jml_debit, SUM(jurnal_umum.kredit_jurnalumum) AS jml_kredit, jurnal_umum.tanggal_jurnalumum, jurnal_umum.id_baganakun, bagan_akun.*
                                                            FROM jurnal_umum INNER JOIN bagan_akun ON jurnal_umum.id_baganakun=bagan_akun.id_baganakun 
                                                            WHERE bagan_akun.posisi='L'
                                                            GROUP BY jurnal_umum.id_baganakun
                                                            ORDER BY jurnal_umum.id_jurnalumum ASC");                                                   
                                                    while($rowsL=mysqli_fetch_array($sqlL)){
                                                        // if($rowsL['grup']=='Debit'){
                                                        //  $jml_debitL = $rowsL['jml_debit']-$rowsL['jml_kredit'];
                                                        //  // $jml_debit = $rows['jml_debit'];
                                                        //  $jml_kredit = 0;
                                                        // }else{
                                                        //  $jml_kreditL = $rowsL['jml_kredit']-$rowsL['jml_debit'];
                                                        //  // $jml_kredit = $rows['jml_kredit'];
                                                        //  $jml_debitL = 0;
                                                        // }
                                                ?>
                                                <tr>
                                                    
                                                    <?php
                                                    if($rowsL['jenis']=='Lancar'){
                                                    $rowsL['jml_debit'];
                                                    ?>
                                                    <tr>
                                                    <th colspan="2" class="left" width="50%">Aktiva Lancar</th>
                                                </tr>
                                                    <td style="text-indent: 2em;" class="left"><?php echo $rowsL['nama_akun']; ?></td>
                                                    <td class="right">
                                                        <?php echo "Rp. ".number_format($rowsL['jml_debit'],2,',','.').""; ?>
                                                    </td>
                                                    <tr>
                                                        <td style="text-indent: 2em;" class="left">Kas</td>
                                                    <td class="right">
                                                        <?php echo "Rp. ".number_format($total_kas,2,',','.').""; ?></td>
                                                    </tr>



                                                    <?php
                                                    @$totalLa=@$rowsL['jml_debit']+@$total_kas;
                                                    ?>

                                                    <tr>
                                                    <td><b><div align="left">Jumlah Aktiva Lancar</div></b></td>
                                                    <td class="right"><b><?php echo "Rp. ".number_format($totalLa,2,',','.').""; ?></b></td>

                                                    <?php
                                                    }




                                                    else{
                                                        
                                                        $jml_kreditL = $rowsL['jml_debit'];
                                                    ?>
                                                    <tr>
                                                    <th colspan="2" class="left" width="50%">Aktiva Tetap</th>
                                                </tr>
                                                    <td style="text-indent: 2em;" class="left"><?php echo $rowsL['nama_akun']; ?></td>
                                                    <td class="right">
                                                        <?php echo "Rp. ".number_format($jml_kreditL,2,',','.').""; ?>
                                                    </td>
                                                    <?php
                                                    @$totalTe+=@$jml_kreditL;
                                                    ?>
                                                    <tr>
                                                    <td><b><div align="left">Nilai Buku</div></b></td>
                                                    <td class="right"><b><?php echo "Rp. ".number_format($totalTe,2,',','.').""; ?></b></td>
                                                </tr>
                                                    <tr>
                                                    <th colspan="2" class="center" width="50%">&nbsp;</th>
                                                </tr>
                                                    <?php
                                                    
                                                    }
                                                    ?>
                                                </tr>
                                                <?php
                                                    // @$total_debitL += @$jml_debitL;
                                                    // @$total_kreditL += @$jml_kreditL;
                                                @$totalLa=@$rowsL['jml_debit']+@$total_kas;
                                                    $totalL = $totalLa+$totalTe;
                                                    }
                                                    // $total_debitL += $jml_debitL;
                                                    // $total_kreditL += $jml_kreditL;
                                                ?>
                                                <tr>
                                                    <th colspan="2" class="center" width="50%">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                    <td><b><u><div align="left">Jumlah Aktiva</div></b></u></td>
                                                    <td class="right"><u><b><?php echo "Rp. ".number_format($totalL,2,',','.').""; ?></u></b></td>
                                                </tr>
                                                



                                                <!-- batas -->
                                                <tr>
                                                    <th colspan="2" class="center" width="50%">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2" class="center" width="50%">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2" class="left" width="50%"><u>Kewajiban dan Modal</u></th>
                                                </tr>
                                                
                                                <?php
                                                    
                                                    $labaK = mysqli_query($conn,"
                                                                SELECT SUM(jurnal_umum.kredit_jurnalumum) AS labaK,
                                                                jurnal_umum.tanggal_jurnalumum
                                                                FROM jurnal_umum INNER JOIN bagan_akun ON jurnal_umum.id_baganakun=bagan_akun.id_baganakun 
                                                                WHERE bagan_akun.posisi_neraca ='T'
                                                            ");
                                                    $lbK = mysqli_fetch_array($labaK);

                                                    $labaD = mysqli_query($conn,"
                                                            SELECT SUM(jurnal_umum.debit_jurnalumum) AS labaD,
                                                            jurnal_umum.tanggal_jurnalumum
                                                            FROM jurnal_umum INNER JOIN bagan_akun ON jurnal_umum.id_baganakun=bagan_akun.id_baganakun 
                                                            WHERE bagan_akun.posisi_neraca ='B'
                                                        ");
                                                    $lbD = mysqli_fetch_array($labaD);

                                                    $modal = mysqli_query($conn,"
                                                            SELECT SUM(jurnal_umum.kredit_jurnalumum) AS modal,
                                                            jurnal_umum.tanggal_jurnalumum
                                                            FROM jurnal_umum INNER JOIN bagan_akun ON jurnal_umum.id_baganakun=bagan_akun.id_baganakun 
                                                            WHERE bagan_akun.posisi ='M'
                                                        ");
                                                    $mdl = mysqli_fetch_array($modal);

                                                    $prive = mysqli_query($conn,"
                                                            SELECT SUM(jurnal_umum.debit_jurnalumum) AS prive,
                                                            jurnal_umum.tanggal_jurnalumum
                                                            FROM jurnal_umum INNER JOIN bagan_akun ON jurnal_umum.id_baganakun=bagan_akun.id_baganakun 
                                                            WHERE bagan_akun.posisi_neraca ='N' AND bagan_akun.pm='1'
                                                        ");
                                                    $prv = mysqli_fetch_array($prive);

                                                    $total_laba = $mdl['modal']+(($lbK['labaK']-$lbD['labaD'])-$prv['prive']);

                                                    
                                                    $sqlR = "SELECT SUM(jurnal_umum.debit_jurnalumum) AS jml_debit, SUM(jurnal_umum.kredit_jurnalumum) AS jml_kredit, jurnal_umum.tanggal_jurnalumum, jurnal_umum.nomorbukti_jurnalumum, bagan_akun.*
                                                            FROM jurnal_umum INNER JOIN bagan_akun ON jurnal_umum.id_baganakun=bagan_akun.id_baganakun
                                                            WHERE bagan_akun.status_akun='Kredit' AND bagan_akun.posisi_neraca='N' 
                                                            GROUP BY jurnal_umum.id_baganakun
                                                            ORDER BY jurnal_umum.id_jurnalumum ASC";
                                                    $queryR = mysqli_query($conn,$sqlR);

                                                    while($rowsR=mysqli_fetch_array($queryR)){

                                                        // if($rowsR['nama_akun']==$dataM){
                                                        //  if($rowsR['grup']=='Debit'){
                                                        //      $jml_debitR = ($rowsR['jml_debit']-$rowsR['jml_kredit'])+$labaD;
                                                        //  }else{
                                                        //      $jml_kreditR = ($rowsR['jml_kredit']-$rowsR['jml_debit'])+$labaD;
                                                        //  }
                                                        // }else{
                                                        //  if($rowsR['grup']=='Debit'){
                                                        //      $jml_debitR = $rowsR['jml_debit']-$rowsR['jml_kredit'];
                                                        //  }else{
                                                        //      $jml_kreditR = $rowsR['jml_kredit']-$rowsR['jml_debit'];
                                                        //  }
                                                        // }

                                                ?>
                                                <tr>
                                                    
                                                    <?php
                                                    if($rowsR['posisi']=='M'){
                                                        $totalM=$total_laba;
                                                    ?>
                                                    <tr>
                                                    <th colspan="2" class="center" width="50%">&nbsp;</th>
                                                </tr>
                                                    <tr>
                                                    <th colspan="2" class="left" width="50%">Modal (Akhir) Pak Candra</th>
                                                </tr>
                                                    <td style="text-indent: 2em;" class="left"><?php echo $rowsR['nama_akun']; ?></td>
                                                    <td class="right">
                                                        <?php echo "Rp. ".number_format($totalM,2,',','.').""; ?>
                                                    </td>
                                                    <?php
                                                    }

                                                    else{
                                                        $totalK=$rowsR['jml_kredit'];
                                                    ?>
                                                    <tr>
                                                    <th colspan="2" class="center" width="50%">&nbsp;</th>
                                                </tr>
                                                    <tr>
                                                    <th colspan="2" class="left" width="50%">Kewajiban</th>
                                                </tr>
                                                    <td style="text-indent: 2em;" class="left"><?php echo $rowsR['nama_akun']; ?></td>
                                                    <td class="right">
                                                        <?php echo "Rp. ".number_format($totalK,2,',','.').""; ?>
                                                    </td>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                                <?php
                                                $totalM=$total_laba;
                                                    $totalKM = $totalK+$totalM;
                                                }
                                                    ?>
                                                
                                                <tr>
                                                    <th colspan="2" class="center" width="50%">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                    <td><u><b><div align="left">Total Kewajiban dan Modal</div></u?</b></td>
                                                    
                                                    <td class="right"><u><b><?php echo "Rp. ".number_format($totalKM,2,',','.').""; ?></u></b></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th colspan="2" class="center" width="50%">&nbsp;</th>
                                                </tr>
                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                                        
    <script>
		window.print();
	</script>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-5">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <p class="mb-0"><?php
echo date("d/m/Y");
?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            
        </div>
    </div>
      
        <!-- Optional JavaScript -->
        <!-- jquery 3.3.1 -->
        <script src="<?php echo $base_url;?>includes/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstap bundle js -->
        <script src="<?php echo $base_url;?>includes/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- slimscroll js -->
        <script src="<?php echo $base_url;?>includes/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- main js -->
        <script src="<?php echo $base_url;?>includes/assets/libs/js/main-js.js"></script>
</body>
 
</html>
<?php 
session_start();
include "../config/koneksi.php";
?>



<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo $base_url;?>includes/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <title>Laporan Laba Rugi</title>
</head>

<body>
<?php if(@$_SESSION['username']){
  ?>
  <?php echo $_SESSION['level'];?>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
    <?php include "header.php";
  ?>
	    </div>
	    <!-- ============================================================== -->
	    <!-- end navbar -->
	    <!-- ============================================================== -->
	    <!-- ============================================================== -->
	    <!-- left sidebar -->
	    <!-- ============================================================== -->
	    <div class="nav-left-sidebar sidebar-dark">
      <?php include "sidebar.php";
  ?>
	    </div>
	    <!-- ============================================================== -->
	    <!-- end left sidebar -->
	    <!-- ============================================================== -->
	    <!-- ============================================================== -->
	    <!-- wrapper  -->
	    <!-- ============================================================== -->
	    <div class="dashboard-wrapper">
	        <div class="dashboard-influence">
	            <div class="container-fluid ">
	                <!-- ============================================================== -->
	                <!-- pageheader  -->
	                <!-- ============================================================== -->

                    <!-- ============================================================== -->
	                <!-- !!! CONTENT !!!  -->
	                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-section" id="overview">
                        </div>
                        <!-- ============================================================== -->
                        <!-- data  -->
                        <!-- ============================================================== -->
                         <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="data">
                                    <h3 class="section-title">Laporan</h3>
                                    <p>Perdana Computer</p>
                                </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Laporan Laba Rugi</h5>
                                <!-- <div align="right">   <a href="../modules/cetak_pembelian.php" class="btn btn-rounded btn-primary">Cetak</a> </div>  -->
                            </div>
                            <div class="card-body">
                                
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table"  data-toggle="table"  data-search="true"  >          
                                        
                                        <tr align="center">
    
                                                <td colspan="4" align="center"><center><b>Tabel</b><center></td>
                                            </tr>
                                            <tr align="center">
                                                <td colspan="4" align="center"><center><b>Panglima Variasi</b><center></td>
                                            </tr>
                                            <tr align="center">
                                                <td colspan="4" align="center"><center><b>Neraca Saldo</b><center></td>
     </tr>
                                            <tr align="center">
                                                <th rowspan="2" align="center" class="center" width="10%"><center>Nomor Akun</center></th>
                                                <th rowspan="2" align="center" class="center" width="35%"><center>Nama Akun</center></th>
                                                <th colspan="2" align="center" class="center" width="30%"><center>Saldo</center></th>
                                            </tr>
                                            <tr align="center">
                                                <th><center>Debit</center></th>
                                                <th><center>Kredit</center></th>
                                            </tr>
     <?php
     $saldo_debit = 0;
     $saldo_kredit = 0;
     $sql = mysqli_query($conn,"SELECT * FROM bagan_akun ORDER BY id_baganakun");


     while ($query = mysqli_fetch_array($sql)) {
      $id_akun = $query['id_baganakun'];

     ?>
     <tr>
      <td class="center"><?=$query['id_baganakun']?></td>
      <td class="center"><?=$query['nama_akun']?></td>
      <?php
      $sal = mysqli_query($conn,"SELECT SUM(debit_jurnalumum) as debit FROM jurnal_umum WHERE kode_akun='$id_baganakun'");
      $debit = mysqli_fetch_array($sal);

      $sal2 = mysqli_query($conn,"SELECT SUM(kredit_jurnalumum) as kredit FROM jurnal_umum WHERE kode_akun=$id_baganakun");
      $kredit = mysqli_fetch_array($sal2);

      if($query['grup'] == "debit") {
       $salD = $debit['debit'] - $kredit['kredit'];
       $saldo_debit += $salD;
       $salK = 0;
      }
      else {
       $salD = 0;
       $salK = $kredit['kredit'];
       $saldo_kredit += $salK;
      }
      ?>
      <td>Rp.<?=number_format($salD)?></td>
      <td>Rp.<?=number_format($salK)?></td>
     </tr>
     <?php } ?>
     <tr>
      <td colspan="2" align="right"><b>Total :</b></td>
      <td><b>Rp.<?=number_format($saldo_debit)?></b></td>
      <td><b>Rp.<?=number_format($saldo_kredit)?></b></td>
     </tr>
     
     
    
                                <tbody>
  
                                </tbody>
                            </table>




                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                        <!-- ============================================================== -->
                        <!-- end data  -->
                        <!-- ============================================================== -->

                  

                    <!-- ============================================================== -->
	                <!-- !!! END CONTENT !!!  -->
	                <!-- ============================================================== -->



	                    <div class="row">
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
	                    <!-- morris-chart js -->
	                    <script src="<?php echo $base_url;?>includes/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
	                    <script src="<?php echo $base_url;?>includes/assets/vendor/charts/morris-bundle/morris.js"></script>
	                    <script src="<?php echo $base_url;?>includes/assets/vendor/charts/morris-bundle/morrisjs.php"></script>
	                    <!-- chart js -->
	                    <script src="<?php echo $base_url;?>includes/assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
	                    <script src="<?php echo $base_url;?>includes/assets/vendor/charts/charts-bundle/chartjs.js"></script>
	                    <!-- dashboard js -->
	                    <script src="<?php echo $base_url;?>includes/assets/libs/js/dashboard-influencer.js"></script>
                      <?php } else { echo "<script>window.location.href='login.php'</script>";} ?>
</body>
 
</html>
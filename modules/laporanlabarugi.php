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
                                <div align="right">   <a href="../modules/cetak_labarugi.php" class="btn btn-rounded btn-primary">Cetak</a> </div> 
                            </div>
                            <div class="card-body">
                                
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" class="table table-bordered" data-toggle="table" data-pagination="true" data-search="true"  >	
                                        
								<tr>
												<th colspan="3" class="left" width="5%">Pendapatan</th>
												</tr>
												<?php
													$total_debitT=0;
													$total_kreditT=0;
													$total_debitB=0;
													$total_kreditB=0;
													

													$sqlT =mysqli_query($conn,"SELECT SUM(jurnal_umum.debit_jurnalumum) AS jml_debit, SUM(jurnal_umum.kredit_jurnalumum) AS jml_kredit, jurnal_umum.tanggal_jurnalumum, jurnal_umum.id_baganakun, bagan_akun.*
															FROM jurnal_umum INNER JOIN bagan_akun ON jurnal_umum.id_baganakun=bagan_akun.id_baganakun 
															WHERE jurnal_umum.tanggal_jurnalumum AND bagan_akun.posisi_neraca='T' AND bagan_akun.posisi_neraca !='N'
															GROUP BY jurnal_umum.id_baganakun
															ORDER BY jurnal_umum.id_jurnalumum ASC");
													
													while($rowsT=mysqli_fetch_array($sqlT)){
												?>
												<tr>
													<td style="text-indent: 2em;" class="left"><?php echo $rowsT['nama_akun']; ?></td>
													<td class="right"></td>
													<td style="text-align:right;" class="right">
														<?php echo "Rp. ".number_format($rowsT['jml_kredit'],2,',','.').""; ?>
													</td>
												</tr>
												<?php
												
												$total_debitT += $rowsT['jml_debit'];
													$total_kreditT += $rowsT['jml_kredit'];
													$totalT = $total_debitT+$total_kreditT;
													}
												?>
												<tr>
													<td><b><div align="left">Total Pendapatan</div></b></td>
													<td class="right"></td>
													<td style="text-align:right;" class="right"><b><?php echo "Rp. ".number_format($total_kreditT,2,',','.').""; ?></b></td>
												</tr>
												<!-- batas -->
												<tr>
													<td colspan="3">&nbsp;</td>
												</tr>
												<tr>
													<th colspan="3" class="left" width="5%">Beban Usaha</th>
												</tr>
												<?php
													$sqlB = mysqli_query($conn,"SELECT SUM(jurnal_umum.debit_jurnalumum) AS jml_debit, SUM(jurnal_umum.kredit_jurnalumum) AS jml_kredit, jurnal_umum.tanggal_jurnalumum, jurnal_umum.id_baganakun, bagan_akun.*
															FROM jurnal_umum INNER JOIN bagan_akun ON jurnal_umum.id_baganakun=bagan_akun.id_baganakun 
															WHERE bagan_akun.posisi_neraca='B' AND bagan_akun.posisi_neraca !='N'
															GROUP BY jurnal_umum.id_baganakun
															ORDER BY jurnal_umum.id_jurnalumum ASC");
													
													while($rowsB=mysqli_fetch_array($sqlB)){
												?>
												<tr>
													<td style="text-indent: 2em;" class="left"><?php echo $rowsB['nama_akun']; ?></td>
													<td style="text-align:right;" class="right"><?php echo "Rp. ".number_format($rowsB['jml_debit'],2,',','.').""; ?></td>
													<td class="right"></td>
												</tr>
												<?php 
													$total_debitB += $rowsB['jml_debit'];
													$total_kreditB += $rowsB['jml_kredit'];
													$totalB = $total_debitB+$total_kreditB;
												}
												?>
												<tr>
													<td><b><div align="left">Total Beban Usaha</div></b></td>
													<td class="right"></td>
													<td style="text-align:right;" class="right"><b><?php echo "Rp. ".number_format($total_debitB,2,',','.').""; ?></b></td>
												</tr>
												<!-- batas -->
												<tr>
													<td colspan="3">&nbsp;</td>
												</tr>
												<!-- /batas -->
												<tr>
													<td><b><div align="left">Laba Bersih</div></b></td>
													<td class="right"></td>
													<td style="text-align:right;" class="right"><b><?php echo "Rp. ".number_format($total_kreditT-$total_debitB,2,',','.').""; ?></b></td>
												</tr>
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
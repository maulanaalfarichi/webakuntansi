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
    <title>Laporan Perubahan Modal</title>
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
	            <div class="container-fluid">
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
                                <h5 class="mb-0">Laporan Perubahan Modal</h5>
                                <div align="right">   <a href="../modules/cetak_perubahanmodal.php" class="btn btn-rounded btn-primary">Cetak</a> </div> 
								</div>
                            <div class="card-body">
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" class="table table-bordered table-hover" data-toggle="table" data-pagination="true" data-search="true"  >	
                                <?php
											
												?>
												<tr>
													<th class="left">Modal (Awal) Pak Candra</th>
													<td class="right"></td>
													<td style="text-align:right;" class="right"><?php
														$modal = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(total_modal) AS total_modal1 FROM modal"));

															echo "Rp. ".number_format($modal['total_modal1'],2,',','.')."";
														?></td>
													</th>
												</tr>
												<tr>						
													<td class="left">
														Laba Bersih
													</td>
													<td style="text-align:right;" class="right">
													<?php
														$labaK = mysqli_query($conn,"
																SELECT SUM(jurnal_umum.kredit_jurnalumum) AS labaK,
																jurnal_umum.tanggal_jurnalumum
																FROM jurnal_umum INNER JOIN bagan_akun ON jurnal_umum.id_baganakun=bagan_akun.id_baganakun 
																WHERE jurnal_umum.tanggal_jurnalumum AND bagan_akun.posisi_neraca ='T'
															");
														$lbK = mysqli_fetch_array($labaK);

														$labaD = mysqli_query($conn,"
																SELECT SUM(jurnal_umum.debit_jurnalumum) AS labaD,
																jurnal_umum.tanggal_jurnalumum
																FROM jurnal_umum INNER JOIN bagan_akun ON jurnal_umum.id_baganakun=bagan_akun.id_baganakun 
																WHERE jurnal_umum.tanggal_jurnalumum AND bagan_akun.posisi_neraca ='B'
															");
														$lbD = mysqli_fetch_array($labaD);

														$total_laba = $lbK['labaK']-$lbD['labaD'];
		
														// $total_debit  = $lb['jml_debit'];
														// $total_kredit = $lb['jml_kredit'];
														// $total_laba   = $total_debit+$total_kredit;

														echo "Rp. ".number_format($total_laba,2,',','.')."";
													?>
													</td>
												</tr>
												<tr>						
													<td style="text-indent: 2em;" class="left">
														Prive
													</td>
													<td style="text-align:right;" class="right">
														<?php
														$prive = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(total_prive) AS total_prive1 FROM prive"));
															echo "Rp. ".number_format($prive['total_prive1'],2,',','.')."";
														?>
													</td>
												</tr>

												<?php
														$hasil = $total_laba-$prive['total_prive1'];
														?>

												<tr>
													<th class="left"></th>
													<td class="right"></td>
													<td style="text-align:right;" class="right"><?php echo "Rp. ".number_format($hasil,2,',','.').""; ?></td>
													</th>
												</tr>

												<tr>
																		
													<td colspan="2">&nbsp;</td>
												</tr>


												<?php 
													$total = $modal['total_modal1']+$hasil;
													// }
												?>

												<tr>						
													<th class="left">
														Modal (Akhir) Pak Candra
													</th>
													<td class="right">
												<td style="text-align:right;" class="right"><b><?php echo "Rp. ".number_format($total,2,',','.').""; ?></b>
													</th>
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
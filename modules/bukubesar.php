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
    <title> Buku Besar</title>
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
                                <h5 class="mb-0">Buku Besar</h5>
                                <div align="right">   <a href="../modules/cetak_bukubesar.php" class="btn btn-rounded btn-primary">Cetak</a> </div> 
                            </div>
                            <div class="card-body">
                                
                            <table id="dataTable3" class="table table-striped table-bordered" style="width:100%">

                                        <tr>
                                            <th colspan="4"><b>Nama Akun : KAS </b></th>
                                            <th colspan="2">
                                                <div align="right"><b>Kode Akun : 101</b></div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center;" rowspan="2" class="center" width="8%"><b>Tanggal</b></td>
                                            <td style="text-align:center;" rowspan="2" class="center" width="26%"><b>Keterangan</b></td>
                                            <td style="text-align:center;" rowspan="2" class="right" width="16%"><b>Debit</b></td>
                                            <td style="text-align:center;" rowspan="2" class="right" width="16%"><b>Kredit</b></td>
                                            <td style="text-align:center;" colspan="2" class="center"><b>Saldo</b></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center;" class="right" width="16%"><b>Debit</b></td>
                                            <td style="text-align:center;" class="right" width="16%"><b>Kredit</b></td>
                                        </tr>
                                        <?php
                                        $query_jurnal = mysqli_query($conn, "SELECT * FROM kas  ORDER BY tanggal_kas, nomortransaksi_kas ASC");
                                        $jurnal_data = mysqli_fetch_array($query_jurnal);

                                        $saldo = 0;
                                        $posisi = "";

                                        if ($jurnal_data['debit_kas'] == 0) {
                                            $saldo = $jurnal_data['kredit_kas'];
                                            $posisi = "kanan";
                                        } else {
                                            $saldo = $jurnal_data['debit_kas'];
                                            $posisi = "kiri";
                                        }

                                        $sqlU = "SELECT * FROM kas";
                                        $queryU    = mysqli_query($conn, $sqlU);
                                        $no = 0;
                                        while ($rowsU = mysqli_fetch_array($queryU)) {
                                            $no++;
                                            ?>
                                            <tr>
                                                <td class="center"><?php echo $rowsU['tanggal_kas']; ?></td>
                                                <td class="center"><?php echo $rowsU['keterangan_kas']; ?></td>
                                                <td class="right">
                                                    <?php echo "Rp. " . number_format($rowsU['debit_kas'], 2, ',', '.') . ""; ?>
                                                </td>
                                                <td class="right">
                                                    <?php echo "Rp. " . number_format($rowsU['kredit_kas'], 2, ',', '.') . ""; ?>
                                                </td>
                                                <?php
                                                if ($posisi == "kiri") {
                                                    if ($rowsU['debit_kas'] == 0) {
                                                        $saldo = $saldo - $rowsU['kredit_kas'];
                                                        $salD = $saldo;
                                                        $salK = 0;
                                                    } else {
                                                        if ($no == 1) {
                                                            $salD = $saldo;
                                                            $salK = 0;
                                                        } else {
                                                            $saldo =  $saldo + $rowsU['debit_kas'];
                                                            $salD = $saldo;
                                                            $salK = 0;
                                                        }
                                                    }
                                                } else {
                                                    if ($rowsU['kredit_kas'] == 0) {
                                                        $saldo = $saldo - $rowsU['debit_kas'];
                                                        $salD = 0;
                                                        $salK = $saldo;
                                                    } else {
                                                        if ($no == 1) {
                                                            $salD = 0;
                                                            $salK = $saldo;
                                                        } else {
                                                            $saldo = $saldo + $rowsU['kredit_kas'];
                                                            $salD = 0;
                                                            $salK = $saldo;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <td class="right">
                                                    <?php echo "Rp. " . number_format($salD, 2, ',', '.') . ""; ?>
                                                </td>
                                                <td class="right">
                                                    <?php echo "Rp. " . number_format($salK, 2, ',', '.') . ""; ?>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                      
                                ?>
                                
                                    
                                    <?php
                                    $sql = "SELECT * FROM jurnal_umum INNER JOIN bagan_akun ON jurnal_umum.id_baganakun=bagan_akun.id_baganakun
               GROUP BY jurnal_umum.id_baganakun
               ORDER BY jurnal_umum.id_baganakun, jurnal_umum.tanggal_jurnalumum, jurnal_umum.nomorbukti_jurnalumum";
                                    $query    = mysqli_query($conn, $sql);

                                    while ($rows = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <th colspan="4"><b>Nama Akun : <?= $rows['nama_akun'] ?></b></th>
                                            <th colspan="2">
                                                <div align="right"><b>Kode Akun : <?= $rows['kode_akun'] ?></b></div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center;" rowspan="2" class="center" width="8%"><b>Tanggal</b></td>
                                            <td style="text-align:center;" rowspan="2" class="center" width="26%"><b>Keterangan</b></td>
                                            <td style="text-align:center;" rowspan="2" class="right" width="16%"><b>Debit</b></td>
                                            <td style="text-align:center;" rowspan="2" class="right" width="16%"><b>Kredit</b></td>
                                            <td style="text-align:center;" colspan="2" class="center"><b>Saldo</b></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center;" class="right" width="16%"><b>Debit</b></td>
                                            <td style="text-align:center;" class="right" width="16%"><b>Kredit</b></td>
                                        </tr>
                                        <?php
                                        $id_baganakun = $rows['id_baganakun'];
                                        $query_jurnal = mysqli_query($conn, "SELECT * FROM jurnal_umum WHERE id_baganakun='$id_baganakun' ORDER BY tanggal_jurnalumum, nomorbukti_jurnalumum ASC");
                                        $jurnal_data = mysqli_fetch_array($query_jurnal);

                                        $saldo = 0;
                                        $posisi = "";

                                        if ($jurnal_data['debit_jurnalumum'] == 0) {
                                            $saldo = $jurnal_data['kredit_jurnalumum'];
                                            $posisi = "kanan";
                                        } else {
                                            $saldo = $jurnal_data['debit_jurnalumum'];
                                            $posisi = "kiri";
                                        }

                                        $sqlU = "SELECT jurnal_umum.*, bagan_akun.id_baganakun, bagan_akun.nama_akun, bagan_akun.status_akun
                                        FROM jurnal_umum LEFT JOIN bagan_akun ON jurnal_umum.id_baganakun=bagan_akun.id_baganakun
                                        WHERE jurnal_umum.id_baganakun='$rows[id_baganakun]'
                                        ORDER BY jurnal_umum.id_baganakun, jurnal_umum.tanggal_jurnalumum, jurnal_umum.nomorbukti_jurnalumum";
                                        $queryU    = mysqli_query($conn, $sqlU);
                                        $no = 0;
                                        while ($rowsU = mysqli_fetch_array($queryU)) {
                                            $no++;
                                            ?>
                                            <tr>
                                                <td class="center"><?php echo $rowsU['tanggal_jurnalumum']; ?></td>
                                                <td class="center"><?php echo $rowsU['keterangan_jurnalumum']; ?></td>
                                                <td class="right">
                                                    <?php echo "Rp. " . number_format($rowsU['debit_jurnalumum'], 2, ',', '.') . ""; ?>
                                                </td>
                                                <td class="right">
                                                    <?php echo "Rp. " . number_format($rowsU['kredit_jurnalumum'], 2, ',', '.') . ""; ?>
                                                </td>
                                                <?php
                                                if ($posisi == "kiri") {
                                                    if ($rowsU['debit_jurnalumum'] == 0) {
                                                        $saldo = $saldo - $rowsU['kredit_jurnalumum'];
                                                        $salD = $saldo;
                                                        $salK = 0;
                                                    } else {
                                                        if ($no == 1) {
                                                            $salD = $saldo;
                                                            $salK = 0;
                                                        } else {
                                                            $saldo =  $saldo + $rowsU['debit_jurnalumum'];
                                                            $salD = $saldo;
                                                            $salK = 0;
                                                        }
                                                    }
                                                } else {
                                                    if ($rowsU['kredit_jurnalumum'] == 0) {
                                                        $saldo = $saldo - $rowsU['debit_jurnalumum'];
                                                        $salD = 0;
                                                        $salK = $saldo;
                                                    } else {
                                                        if ($no == 1) {
                                                            $salD = 0;
                                                            $salK = $saldo;
                                                        } else {
                                                            $saldo = $saldo + $rowsU['kredit_jurnalumum'];
                                                            $salD = 0;
                                                            $salK = $saldo;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <td class="right">
                                                    <?php echo "Rp. " . number_format($salD, 2, ',', '.') . ""; ?>
                                                </td>
                                                <td class="right">
                                                    <?php echo "Rp. " . number_format($salK, 2, ',', '.') . ""; ?>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                                ?>
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
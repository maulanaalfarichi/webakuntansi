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
    <title>Jurnal Umum</title>
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
                                <h5 class="mb-0">Jurnal Umum</h5>
                                <div align="right">   <a href="../modules/cetak_jurnalumum.php" class="btn btn-rounded btn-primary">Cetak</a> </div> 
             
                            </div>
                            
                            <div class="card-body">
                                
                                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Tanggal</th>
                                                <th style="text-align:center;">Nomor Bukti</th>
                                                <th style="text-align:center;">Keterangan</th>
                                                <th style="text-align:center;">Ref</th>
                                                <th style="text-align:center;">Debit</th>
                                                <th style="text-align:center;">Kredit</th>
                                            </tr>
                                        </thead>
                                        <?php
  $no =1;
  $ambil = mysqli_query($conn,"SELECT * FROM jurnal_umum INNER JOIN bagan_akun ON jurnal_umum.id_baganakun=bagan_akun.id_baganakun order by tanggal_jurnalumum ASC");
  while ($data = mysqli_fetch_array($ambil)) {
    ?>


    <!-- Baris 1 -->
  <tr>
    <td><?php echo $data['tanggal_jurnalumum'];?></td>
    <td><?php echo $data['nomorbukti_jurnalumum'];?></td>
    <!-- KETERANGAN -->
    <td>
    <?php
        if($data['kode_akun']=="102"){
            echo 'Perlengkapan';}
        if($data['kode_akun']=="103"){
            echo 'Peralatan';}
            if($data['kode_akun']=="104"){
                echo 'Piutang Jasa';}
        if($data['kode_akun']=="201"){
            echo 'Kas';}
            if($data['kode_akun']=="202"){
                echo 'Kas';}
        if($data['kode_akun']=="301"){
            echo 'Kas';}
            if($data['kode_akun']=="401"){
                echo 'Kas';}
            if($data['kode_akun']=="302"){
                echo 'Prive';}
        if($data['kode_akun']=="501"){
            echo 'Beban Listrik';}
        if($data['kode_akun']=="502"){
            echo 'Beban Air';}
        if($data['kode_akun']=="503"){
            echo 'Beban Telepon';}
        if($data['kode_akun']=="504"){
            echo 'Beban Wifi';}
        if($data['kode_akun']=="505"){
            echo 'Beban Gaji dan Komisi';}
        if($data['kode_akun']=="506"){
            echo 'Beban Bunga';}
        ?>
    </td>
    <!-- REF -->
    <td><?php 
    if($data['kode_akun']=="102")
    echo $data['kode_akun'];
    if($data['kode_akun']=="103")
    echo $data['kode_akun'];
    if($data['kode_akun']=="104")
    echo $data['kode_akun'];
    if($data['kode_akun']=="302")
    echo $data['kode_akun'];
    if($data['kode_akun']=="501")
    echo $data['kode_akun'];
    if($data['kode_akun']=="502")
    echo $data['kode_akun'];
    if($data['kode_akun']=="503")
    echo $data['kode_akun'];
    if($data['kode_akun']=="504")
    echo $data['kode_akun'];
    if($data['kode_akun']=="505")
    echo $data['kode_akun'];
    if($data['kode_akun']=="506")
    echo $data['kode_akun'];
    if($data['kode_akun']=="301")
    echo '101';
    if($data['kode_akun']=="401")
    echo '101';
    if($data['kode_akun']=="201")
    echo '101';
    if($data['kode_akun']=="202")
    echo '101';
    
    ?></td>
    <!-- DEBIT -->
    <td style="text-align:center;">
    <?php
    if($data['kode_akun']=="102")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="103")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="302")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="501")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="502")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="503")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="504")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="505")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="506")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="301")
    echo "Rp ".number_format($data['kredit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="401")
    echo "Rp ".number_format($data['kredit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="201")
    echo "Rp ".number_format($data['kredit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="202")
    echo "Rp ".number_format($data['kredit_jurnalumum'], 2, ",", ".");
    ?>
</td>
<!-- KREDIT -->
    <td></td>
  </tr>
  
<!-- Baris 2 -->
  <tr>
    <td></td>
    <td></td>
<!-- keterangan -->
    <td>
        <?php
        if($data['kode_akun']=="102"){
            echo 'Kas';}
        if($data['kode_akun']=="103"){
            echo 'Kas';}
            if($data['kode_akun']=="201"){
                echo 'Hutang Bank';}
                if($data['kode_akun']=="202"){
                    echo 'Hutang Bunga';}
        if($data['kode_akun']=="301"){
            echo 'Modal';}
            if($data['kode_akun']=="401"){
                echo 'Pendapatan';}
            if($data['kode_akun']=="302"){
                echo 'Kas';}
            if($data['kode_akun']=="501"){
                echo 'Kas';}
            if($data['kode_akun']=="502"){
                echo 'Kas';}
            if($data['kode_akun']=="503"){
                echo 'Kas';}
                if($data['kode_akun']=="504"){
                    echo 'Kas';}
                if($data['kode_akun']=="505"){
                    echo 'Kas';}
                if($data['kode_akun']=="506"){
                    echo 'Kas';}
        ?>
        </td>
<!-- ref -->
    <td>
    <?php 
    if($data['kode_akun']=="102")
    echo '101';
    if($data['kode_akun']=="103")
        echo '101';
    if($data['kode_akun']=="302")
    echo '101';
    if($data['kode_akun']=="501")
    echo '101';
    if($data['kode_akun']=="502")
    echo '101';
    if($data['kode_akun']=="503")
    echo '101';
    if($data['kode_akun']=="504")
    echo '101';
    if($data['kode_akun']=="505")
    echo '101';
    if($data['kode_akun']=="506")
    echo '101';

    if($data['kode_akun']=="301")
    echo $data['kode_akun'];
    if($data['kode_akun']=="401")
    echo $data['kode_akun'];
    if($data['kode_akun']=="201")
    echo $data['kode_akun'];
    if($data['kode_akun']=="202")
    echo $data['kode_akun'];
    ?>
    
    </td>
    <!-- DEBIT -->
    <td></td>
    <!-- KREDIT -->
    <td style="text-align:center;">
    <?php
    if($data['kode_akun']=="102")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="103")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="302")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="501")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="502")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="503")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="504")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="505")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="506")
    echo "Rp ".number_format($data['debit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="301")
    echo "Rp ".number_format($data['kredit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="401")
    echo "Rp ".number_format($data['kredit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="201")
    echo "Rp ".number_format($data['kredit_jurnalumum'], 2, ",", ".");
    if($data['kode_akun']=="202")
    echo "Rp ".number_format($data['kredit_jurnalumum'], 2, ",", ".");
    ?>
</td>
  </tr>


<!-- Baris 3 -->
  <tr>
    <td></td>
    <td></td>
    <td><i><?php echo $data['keterangan_jurnalumum'];?></i></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
<!-- Baris 4 -->
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  
<?php
  }
  ?>
                                        <tbody>
                                            <tr>
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
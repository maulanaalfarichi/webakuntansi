<?php 
session_start();
include "../config/koneksi.php";

$sql = "SELECT max(nomortransaksi_modal) FROM modal";
$query = mysqli_query($conn, $sql);

$transaksi = mysqli_fetch_array($query);

if ($transaksi) {
    $nilai = substr($transaksi[0], 1);
    $kode = (int)$nilai;

    //tambahkan sebanyak + 1
    $kode = $kode + 1;
    $auto_kode = "G" . str_pad($kode, 4, "0",  STR_PAD_LEFT);
} else {
    $auto_kode = "G0001";
}
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
    <title>Modal</title>
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
	                <div class="row">    
	                </div>
	               
                   
                   
<!-- ============================================================== -->
	                <!-- !!! CONTENT !!!  -->
	                <!-- ============================================================== -->
                    <!-- ============================================================== -->
	                <!-- !!! MODAL TAMBAH !!!  -->
	                <!-- ============================================================== -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Transaksi Modal</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                                        <form action="../config/input_modal.php" method="POST">
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Nomor Transaksi</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="nomortransaksi_modal" required="" readonly  value="<?php echo $auto_kode; ?>" class="form-control">
                                            </div>
                                        </div>
                                        </div>

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Tanggal</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="date" name="tanggal_modal"  required="" placeholder="" class="form-control">
                                        </div>
                                        </div>
                                        </div>
                                                            
                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Keterangan</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="keterangan_modal" required="" placeholder=""  class="form-control">
                                            </div>
                                        </div>
                                        </div>
                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Total Rp.</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="number" name="total_modal"  required="" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                         
                                                            
                                        <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="akun_modal">Akun</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <select name="id_baganakun" class="form-control">
                                            <?php
  
                                                $ambil = mysqli_query($conn,"SELECT * FROM bagan_akun");
                                            while ($data = mysqli_fetch_array($ambil)) {
                                                ?>
                                                <option value="<?php echo $data['id_baganakun'] ?>"><?php echo $data['nama_akun'] ?></option>
                                               
                                            <?php }?>
                                            </select>
                                        </div>
                                        </div>
                                    </div>

                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-2">
                                                <button type="submit" class="btn btn-rounded btn-success" name="simpan">Submit</button>
                                                
                                            </div>
                                      </div>
                                                 </form>           
                                        </div>
                                        </div>
                                                </div>
                                            </div>
                                           
                    <!-- ============================================================== -->
	                <!-- !!! END MODAL !!!  -->
	                <!-- ============================================================== -->
                    <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Modal</h2>
                            <p>Pemasukan / Modal</P>
                            
                        </div>
                    </div>
                </div>
                      <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div align="right"> <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Transaksi Modal</a> </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th style="text-align:center;">Nomor</th>
                                            <th style="text-align:center;">Nomor Transaksi</th>
                                                <th style="text-align:center;">Tanggal</th>
                                                <th style="text-align:center;">Keterangan</th>
                                                <th style="text-align:center;">Total</th>
                                                <th style="text-align:center;">Akun</th>
                                                <!-- <th style="text-align:center;" colspan="2"> Action</th> -->
                                            </tr>
                                        </thead>
                                        <?php
  $no =1;
  $ambil1 = mysqli_query($conn,"SELECT * FROM modal inner join bagan_akun on modal.id_baganakun=bagan_akun.id_baganakun");
  while ($data1 = mysqli_fetch_array($ambil1)) {
    ?>
  <tr>
    <td style="text-align:center;"><?php echo $no++;?></td> <!-- ini ID -->
    <td style="text-align:center;"><?php echo $data1['nomortransaksi_modal'];?></td>
    <td style="text-align:center;"><?php echo $data1['tanggal_modal'];?></td>
    <td style="text-align:left;"><?php echo $data1['keterangan_modal'];?></td>
    <td style="text-align:center;"><?php echo "Rp ".number_format($data1['total_modal'], 2, ",", ".");?></td>
    <td style="text-align:center;"><?php echo $data1['nama_akun'];?></td>
    <!-- <td style="text-align:center;">
        <a class="btn btn-rounded btn-warning" data-toggle="modal" data-target="#exampleModal<?=$data1['id_modal'] ?>">Edit</a> | -->
      
                     <!-- ============================================================== -->
                        <!-- !!! MODAL !!! EDIT -->
                    <!-- ============================================================== -->
                    <?php $ambil3 = mysqli_query($conn,"SELECT * FROM modal inner join bagan_akun on modal.id_baganakun=bagan_akun.id_baganakun WHERE modal.id_modal='$data1[id_modal]'");
                    $data3 = mysqli_fetch_array($ambil3);  ?>
                    <div class="modal fade" id="exampleModal<?=$data3['id_modal'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel2">Edit Data modal</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>                   
                                                            
                                                            <form action="modal.php" method="POST">
                                                            <input type="text" hidden="" required="" placeholder="" name="idnya" class="form-control" value="<?php echo $data3['id_modal']?>" >

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="tanggal_modal">Tanggal</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="date" required="" placeholder="" name="tanggal_modal" class="form-control" value="<?=$data3['tanggal_modal'] ?>" >

                                            </div>
                                        </div>
                                                            </div>

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="keterangan_modal">Keterangan</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="" name="keterangan_modal" class="form-control" value="<?=$data3['keterangan_modal'] ?>" >

                                            </div>
                                        </div>
                                                            </div>

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="total_modal">Total</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="number" required="" placeholder="" name="total_modal" value="<?=$data3['total_modal'] ?>" class="form-control">
                                            </div>
                                        </div>
                                                            </div>

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="akun_modal">Akun</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <select name="id_baganakun" class="form-control">
                                                            <?php
  $amb = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM modal WHERE id_baganakun='$data3[id_baganakun]'"));
  $ambil2 = mysqli_query($conn,"SELECT * FROM bagan_akun");
  while ($dt = mysqli_fetch_array($ambil2)) {
    
      if ($amb['id_baganakun']==$dt['id_baganakun']){
          $s='selected';
      }
      else {
          $s='';
      }
    ?>
                                                <option value="<?php echo $dt['id_baganakun'] ?>" <?=$s?> ><?php echo $dt['nama_akun'] ?></option>
                                               
  <?php }?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-2">
                                                <button type="submit" class="btn btn-rounded btn-success" name="save">Simpan</button>
                                                </form>
                                            </div>
                                      </div>
                                      </div>
                                      </div>
                                      </div>
                                      </div>
        
        <!-- <a class="btn btn-rounded btn-danger" href="../config/hapus_modal.php?id_modal=<?php echo $data1['id_modal']?>" onclick="return confirm('Yakin anda ingin hapus?')">Hapus</a>      -->
    </td>
  </tr>
  <?php
  }
  ?>
                                    </table>

                                    <p><p>Total Transaksi Modal : <?php echo mysqli_num_rows($ambil1) ?></p></p>

                                   <div align="right">   <a href="../modules/cetakmodal.php" class="btn btn-info">Cetak Transaksi Modal</a> </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
    </div>
   
  
                        <!-- ============================================================== -->
                        <!-- end CONTENT  -->
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

<?php

if(isset($_POST['save'])){
    $id = $_POST['idnya'];
$tgl = $_POST['tanggal_modal'];
$ket = $_POST['keterangan_modal'];
$tot = $_POST['total_modal'];
$akun = $_POST['akun_modal'];
$id_baganakun = $_POST['id_baganakun'];

// buat query 
$sql = "UPDATE modal SET tanggal_modal='$tgl', keterangan_modal='$ket', total_modal='$tot', akun_modal='$akun',id_baganakun='$id_baganakun' WHERE id_modal='$id'";
$query = mysqli_query($conn, $sql);
echo "<script>window.location.href='modal.php'</script>"; 
}

?>

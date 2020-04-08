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
    <title>Data Akun</title>
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
	                <!-- !!! MODAL !!! TAMBAH -->
	                <!-- ============================================================== -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Akun</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>

                                                            <form action="../config/input_akun.php" method="POST">

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Kode Akun</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="Masukkan Kode Akun" name="kode_akun" class="form-control">
                                            </div>
                                        </div>
                                                            </div>

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Nama Akun</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="Masukkan Nama Akun" name="nama_akun" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-2">
                                                <button type="submit" class="btn btn-rounded btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
	                <!-- !!! END MODAL !!! TAMBAH -->
	                <!-- ============================================================== -->             
                    <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"> 
                        <div class="page-header">
                            <h2 class="pageheader-title">Data Akun</h2>
                        <p> Perdana Computer </p>
                        </div>
                    </div>
                </div>

                      <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div align="right"> <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Akun</a> </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Nomor</th>
                                                <th style="text-align:center;">Kode Akun</th>
                                                <th style="text-align:center;">Nama Akun</th>
                                                <th style="text-align:center;" colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
  $no =1;
  $ambil = mysqli_query($conn,"SELECT * FROM bagan_akun");
  while ($data = mysqli_fetch_array($ambil)) {
    ?>
  <tr>
    <td style="text-align:center;"><?php echo $no++;?></td> <!-- ini ID -->
    <td style="text-align:center;"><?php echo $data['kode_akun'];?></td>
    <td style="text-align:center;"><?php echo $data['nama_akun'];?></td>
    <td style="text-align:center;">
        <a class="btn btn-rounded btn-warning" data-toggle="modal" data-target="#exampleModal1<?=$data['id_baganakun'] ?>">Edit</a> | 


                    <!-- !!! MODAL !!! EDIT -->
                    <!-- ============================================================== -->
                    <div class="modal fade" id="exampleModal1<?=$data['id_baganakun'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Akun</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>                   
                                                            
                                                            <form action="dataakun.php" method="POST">

                                                            <input type="text" hidden="" required="" placeholder="" name="idx" class="form-control" value="<?php echo $data['id_baganakun']; ?>">

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="kode_akun">Kode Akun</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input required="" type="text" placeholder="" name="kode_akun" class="form-control" value="<?php echo $data['kode_akun']; ?>">
                                            </div>
                                        </div>
                                                            </div>

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="nama_akun">Nama Akun</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input required="" type="text"  placeholder="" name="nama_akun" class="form-control" value="<?php echo $data['nama_akun']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-2">
                                                <button type="simpan" class="btn btn-rounded btn-success" name="simpan">Simpan</button>
                                                
                                            </div>
                                      </div>
                                      </form>      
                                        </div>
                                        </div>
                                                </div>
                                            </div>
                                            
                    <!-- ============================================================== -->
                    <!-- !!! END MODAL !!! EDIT -->
                    <!-- ============================================================== -->
        
        <a class="btn btn-rounded btn-danger" href="../config/hapus_akun.php?id_baganakun=<?php echo $data['id_baganakun']?>" onclick="return confirm('Data ini akan dihapus. Apakah anda yakin?')">Hapus</a>  
            
    </td>
  </tr>
  <?php 
  }
  ?>
                                      
                                    </table>

                                    <p><p>Total Akun : <?php echo mysqli_num_rows($ambil) ?></p></p>
                                    
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

if(isset($_POST['simpan'])){
    $id = $_POST['idx'];
$kode_akun = $_POST['kode_akun'];
$nama_akun = $_POST['nama_akun'];

// buat query 
$sql = "UPDATE bagan_akun SET kode_akun='$kode_akun', nama_akun='$nama_akun' WHERE id_baganakun='$id'";
$query = mysqli_query($conn, $sql);
echo "<script>window.location.href='dataakun.php'</script>"; 
}

?>
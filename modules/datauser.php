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
    <title>Data User</title>
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
                                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>

                                                            <form action="../config/input_user.php" method="POST">

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Username</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="Masukkan Username" name="username" class="form-control">
                                            </div>
                                        </div>
                                                            </div>

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="Masukkan Password" name="password" class="form-control">
                                            </div>
                                        </div>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Kontak</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="Masukkan Nomor Ponsel" name="kontak" class="form-control">
                                            </div>
                                        </div>
                                                            </div>

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Level</label>
                                            <div class="col-12 col-sm-8 col-lg-5">
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="level" checked="" class="custom-control-input" value="1"><span class="custom-control-label">Admin</span>
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="level" checked="" class="custom-control-input" value="2"><span class="custom-control-label">Karyawan</span>
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="level" checked="" class="custom-control-input" value="3"><span class="custom-control-label">Pemilik</span>
                                            </label>
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
                            <h2 class="pageheader-title">Data User</h2>
                        <p> Perdana Computer </p>
                        </div>
                    </div>
                </div>

                      <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div align="right"> <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah User</a> </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th style="text-align:center;">#</th>
                                                <th style="text-align:center;">Username</th>
                                                
                                                <th style="text-align:center;">Password</th>
                                                <th style="text-align:center;">Kontak</th>
                                                <th style="text-align:center;">Level</th>
                                                <th style="text-align:center;" colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <?php
  $no =1;
  $num =1;
  $ambil = mysqli_query($conn,"SELECT * FROM user");
  while ($data = mysqli_fetch_array($ambil)) {
    ?>
  <tr>
    <td style="text-align:center;"><?php echo $num++;?></td> <!-- ini ID -->
    <td style="text-align:center;"><?php echo $data['username'];?></td>
    <td style="text-align:center;"><?php echo $data['password'];?></td>
    <td style="text-align:center;"><?php echo $data['kontak'];?></td>
    <td style="text-align:center;"><?php if($data['level']=="1"){
        echo 'Admin';
    }
    if($data['level']=="2"){
        echo 'Karyawan';
    }
    if($data['level']=="3"){
        echo 'Pemilik';
    }
    
    ?></td>
    
    <td>
        <a class="btn btn-rounded btn-warning" data-toggle="modal" data-target="#exampleModal1<?=$data['id_user'] ?>">Edit</a> | 


                    <!-- !!! MODAL !!! EDIT -->
                    <!-- ============================================================== -->
                    <div class="modal fade" id="exampleModal1<?=$data['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>                   
                                                            
                                                            <form action="datauser.php" method="POST">

                                                            <input type="text" hidden="" required="" placeholder="" name="idx" class="form-control" value="<?php echo $data['id_user']; ?>">

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="username">Username</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input required="" type="text" placeholder="" name="username" class="form-control" value="<?php echo $data['username']; ?>">
                                            </div>
                                        </div>
                                                            </div>

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="password">Password</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input required="" type="text"  placeholder="" name="password" class="form-control" value="<?php echo $data['password']; ?>">
                                            </div>
                                        </div>
                                                            </div>

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Nomor HP</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="Masukkan Nomor Ponsel" name="kontak" class="form-control" value="<?php echo $data['kontak']; ?>">
                                            </div>
                                        </div>
                                                            </div>

                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="level">Level</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <select name="level" class="form-control">
                                                <option <?php if($data['level']=="1") echo "selected"; ?> value="1">Admin</option>
                                                <option <?php if($data['level']=="2") echo "selected"; ?> value="2">Karyawan</option>
                                                <option <?php if($data['level']=="3") echo "selected"; ?> value="3">Pemilik</option>
                                            </select>
                                            
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
        
        <a class="btn btn-rounded btn-danger" href="../config/hapus_user.php?id_user=<?php echo $data['id_user']?>" onclick="return confirm('Data ini akan dihapus. Apakah anda yakin?')">Hapus</a>  
            
    </td>
  </tr>
  <?php 
  }
  ?>
                                      
                                    </table>

                                    <p><p>Total User : <?php echo mysqli_num_rows($ambil) ?></p></p>
                                    
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
$username = $_POST['username'];
$password = $_POST['password'];
$kontak = $_POST['kontak'];
$level = $_POST['level'];

// buat query 
$sql = "UPDATE user SET username='$username', password='$password', kontak='$kontak', level='$level' WHERE id_user='$id'";
$query = mysqli_query($conn, $sql);
echo "<script>window.location.href='datauser.php'</script>"; 
}

?>
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
    <title>Cetak Transaksi Modal</title>
</head>

<body>
  
    <div class="dashboard-main-wrapper">
       
        
            
                <div class="container-fluid ">
                   
                    <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header p-4">
                                    <div class="float-right"> <h3 class="mb-0">Perdana Computer</h3>
                                    <h4 class="text-dark mb-1"><i>Data Transaksi Modal</i></h4>  
                                    </div>
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
		</tr>
		<?php 
		}
		?>
	</table>
    <script>
		window.print();
	</script>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-5">
                                        </div>
                                    </div>
                                </div>
                                <p><p>Total Transaksi Modal : <?php echo mysqli_num_rows($ambil1) ?></p></p>
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
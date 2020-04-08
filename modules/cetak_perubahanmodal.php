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
    <title>Laporan Perubahan Modal</title>
</head>

<body>
  
    <div class="dashboard-main-wrapper">
       
        
            
                <div class="container-fluid ">
                   
                    <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header p-4">
                                    <div class="float-right"> <h3 class="mb-0">Perdana Computer</h3>
                                    <h4 class="text-dark mb-1"><i>Laporan Perubahan Modal</i></h4>  
                                    </div>
                                </div>
                                <div class="card-body">                                
                                                                                  
                                    <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"  >  
                                <?php
                                            
                                                ?>
                                                <tr>
                                                    <th class="left">Modal (Awal) Pak Candra</th>
                                                    <td class="right"></td>
                                                    <td style="text-align:right;" class="right"><?php
                                                        $modal = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM modal"));
                                                            echo "Rp. ".number_format($modal['total_modal'],2,',','.')."";
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
                                                    $total = $modal['total_modal']+$hasil;
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
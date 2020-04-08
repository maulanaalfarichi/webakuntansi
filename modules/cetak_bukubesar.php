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
    <title>Laporan Buku Besar</title>
</head>

<body>
  
    <div class="dashboard-main-wrapper">
       
        
            
                <div class="container-fluid ">
                   
                    <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header p-4">
                                    <div class="float-right"> <h3 class="mb-0">Perdana Computer</h3>
                                    <h4 class="text-dark mb-1"><i>Laporan Buku Besar</i></h4>  
                                    </div>
                                </div>
                                <div class="card-body">
                                
                            <table id="dataTable3" class="table table-striped table-bordered" style="width:100%">


                                <?php
                                    $sqlk = "SELECT * FROM kas INNER JOIN bagan_akun ON kas.id_baganakun=bagan_akun.id_baganakun
               GROUP BY kas.id_baganakun
               ORDER BY kas.id_baganakun, kas.tanggal_kas, kas.nomortransaksi_kas";
                                    $queryk    = mysqli_query($conn, $sqlk);

                                    while ($rowsk = mysqli_fetch_array($queryk)) {
                                        ?>

                                        <tr>
                                            <th colspan="4"><b>Nama Akun : Kas</b></th>
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
                                        $id_baganakunk = $rowsk['id_baganakun'];
                                        $query_jurnalk = mysqli_query($conn, "SELECT * FROM kas WHERE id_baganakun='$id_baganakunk' ORDER BY tanggal_kas, nomortransaksi_kas ASC");
                                        $jurnal_datak = mysqli_fetch_array($query_jurnalk);

                                        $saldok = 0;
                                        $posisik = "";

                                        if ($jurnal_datak['debit_kas'] == 0) {
                                            $saldok = $jurnal_datak['kredit_kas'];
                                            $posisik = "kanan";
                                        } else {
                                            $saldok = $jurnal_datak['debit_kas'];
                                            $posisik = "kiri";
                                        }

                                        $sqlkk = "SELECT kas.*, bagan_akun.id_baganakun, bagan_akun.nama_akun, bagan_akun.status_akun
                                        FROM kas LEFT JOIN bagan_akun ON kas.id_baganakun=bagan_akun.id_baganakun
                                        WHERE kas.id_baganakun='$rowsk[id_baganakun]'
                                        ORDER BY kas.id_baganakun, kas.tanggal_kas, kas.nomortransaksi_kas";
                                        $querykk    = mysqli_query($conn, $sqlkk);
                                        $nok = 0;
                                        while ($rowskk = mysqli_fetch_array($querykk)) {
                                            $nok++;
                                            ?>
                                            <tr>
                                                <td class="center"><?php echo $rowskk['tanggal_kas']; ?></td>
                                                <td class="center"><?php echo $rowskk['keterangan_kas']; ?></td>
                                                <td class="right">
                                                    <?php echo "Rp. " . number_format($rowskk['debit_kas'], 2, ',', '.') . ""; ?>
                                                </td>
                                                <td class="right">
                                                    <?php echo "Rp. " . number_format($rowskk['kredit_kas'], 2, ',', '.') . ""; ?>
                                                </td>
                                                <?php
                                                if ($posisik == "kiri") {
                                                    if ($rowskk['debit_kas'] == 0) {
                                                        $saldok = $saldok - $rowskk['kredit_kas'];
                                                        $salDk = $saldok;
                                                        $salKk = 0;
                                                    } else {
                                                        if ($nok == 1) {
                                                            $salDk = $saldok;
                                                            $salKk = 0;
                                                        } else {
                                                            $saldok =  $saldok + $rowskk['debit_kas'];
                                                            $salDk = $saldok;
                                                            $salKk = 0;
                                                        }
                                                    }
                                                } else {
                                                    if ($rowskk['kredit_kas'] == 0) {
                                                        $saldok = $saldok - $rowskk['debit_kas'];
                                                        $salDk = 0;
                                                        $salKk = $saldok;
                                                    } else {
                                                        if ($nok == 1) {
                                                            $salDk = 0;
                                                            $salKk = $saldok;
                                                        } else {
                                                            $saldok = $saldok + $rowskk['kredit_kas'];
                                                            $salDk = 0;
                                                            $salKk = $saldok;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <td class="right">
                                                    <?php echo "Rp. " . number_format($salDk, 2, ',', '.') . ""; ?>
                                                </td>
                                                <td class="right">
                                                    <?php echo "Rp. " . number_format($salKk, 2, ',', '.') . ""; ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
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

                                        <tbody>
                                            <tr>
                                            </tr>
                                        </tbody>
                                       
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
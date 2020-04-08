<!DOCTYPE html>
<html>
<head>
	<title>CETAK PEMBELIAN</title>
</head>
<body>

	<center>

		<h2>PEMBELIAN</h2>
		<h4>Perdana Computer</h4>

	</center>

	<?php 
	include "../config/koneksi.php";
	?>

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
  $ambil1 = mysqli_query($conn,"SELECT * FROM pembelian inner join bagan_akun on pembelian.id_baganakun=bagan_akun.id_baganakun");
  while ($data1 = mysqli_fetch_array($ambil1)) {
    ?>
  <tr>
    <td style="text-align:center;"><?php echo $no++;?></td> <!-- ini ID -->
    <td style="text-align:center;"><?php echo $data1['nomortransaksi_pembelian'];?></td>
    <td style="text-align:center;"><?php echo $data1['tanggal_pembelian'];?></td>
    <td style="text-align:left;"><?php echo $data1['keterangan_pembelian'];?></td>
    <td style="text-align:center;"><?php echo "Rp ".number_format($data1['total_pembelian'], 2, ",", ".");?></td>
    <td style="text-align:center;"><?php echo $data1['nama_akun'];?></td>
		</tr>
		
		<?php 
		}
		?>
	</table>

	<script>
		window.print();
	</script>

</body>
</html>
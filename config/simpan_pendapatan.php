<?php
// $tableP			="tb_pembelian";
// $tableJ			="tb_jurnal";
//insert.php;
// if(isset($_POST["barang"])){
// 	for($count = 0; $count < count($_POST["barang"]); $count++){	
	$tanggal_pendapatan			=$_POST['tanggal_pendapatan'];
	$id_baganakun				=$_POST['id_baganakun'];
	$total_pendapatan			=$_POST['total_pendapatan'];
	$nomortransaksi_pendapatan 	=$_POST['nomortransaksi_pendapatan'];

	$tanggal = date("Y-m-d", strtotime($tanggal_pendapatan));
	// $total_pendapatan = convertCurrency($harga);

	$keterangan = "Pendapatan Penjualan Barang Dagang";

	// $cek_qty = cekStok($barang);
	// $update_qty = $cek_qty + $quantity;
	// if($cek_qty > $quantity){
	// $query = "INSERT INTO tb_penjualan_detail(no_penjualan,kode_barang,quantity_penjualan,harga)VALUES('$nomortransaksi_pendapatan','$_POST[barang][$count]','$_POST[quantity][$count]','$_POST[harga_barang][$count]')
	//  	";

		$inputP = "INSERT INTO tb_penjualan(no_penjualan,id_id_baganakun,kode_barang,nama_customer,tanggal_pendapatan_penjualan,quantity_penjualan,total_pendapatan,id_user)VALUES('$nomortransaksi_pendapatan','$id_baganakun','$barang','$pembeli','$tanggal','$quantity','$total_pendapatan','$id_user')";

		$inputJ = "INSERT INTO tb_jurnal(id_id_baganakun,no_jurnal,keterangan,debit,kredit,tanggal_pendapatan)
		VALUES('$id_baganakun','$nomortransaksi_pendapatan','$keterangan','0','$total_pendapatan','$tanggal')";

		$inputK = "INSERT INTO tb_jurnal(id_id_baganakun,no_jurnal,keterangan,debit,kredit,tanggal_pendapatan)
		VALUES('11','$nomortransaksi_pendapatan','$keterangan','$total_pendapatan','0','$tanggal')";
		
		$queryP = mysql_query($inputP);
		$queryJ = mysql_query($inputJ);
		$queryK = mysql_query($inputK);
		// $statement = mysql_query($query);
// 		if ($queryP==TRUE AND $queryJ==TRUE AND $queryK==TRUE){
// 			echo 'ok';
// 		}		
// 	} else {
// 		echo '<script language="javascript">document.location.href="?page=data_penjualan&status=10"</script>';	
// 	}
// }
?>
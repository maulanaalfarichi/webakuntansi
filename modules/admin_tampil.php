<?php
include "koneksi.php"

?>

<link href="style.css" rel="stylesheet" type="text/css">

<body>
<div class="container-table">
	
	<h2 align="center" style="border-bottom:2px solid#999;">Data Admin</h2>
	<input type="button" class="btn-biru" value="Tambah Data" style="float:left;" onclick="window.location.href='index.php?pages=admin_tambah'">
	<form  action="" method="POST" > 
		<input type="text" style="margin-left:10px;width:70%;height:35px;" name="keyword" placeholder="Cari penelusuran..">
		<button style="padding:10px 20px;"> Search </button>
	</form>

<table id="t">
	<tr>
		<th>Username</th>
		<th>Nama</th>
		<th>Level</th>
		<th>foto</th>
		<th>Opsi</th>
	</tr>
	
	<?php
		$keyword = @$_POST['keyword'];
		$hal	 = @$_GET['hal'];
		$no = 1;
		$batas =4;
		
		if(empty($hal)){
			$posisi =0;
			$hal	= 1;
		} else {
			$posisi = $batas * ($hal-1);
		}
		$no = $posisi + 1;
		
		$query	= mysql_query("SELECT * FROM _admin where usernames LIKE '%$keyword%'")or die (mysql_error());
			while ($hasil = mysql_fetch_array($query)) {
				echo"<tr>";
				echo"<td width='15%'>$hasil[usernames]</td>";
				echo"<td width='15%'>$hasil[nama]</td>";
				echo"<td width='20%'>$hasil[level]</td>";
				echo"<td width='25%'><img src='gambar/$hasil[foto]' width='50' height='50'></td>";
				echo"<td width='25%'>
					<a href='index.php?pages=admin_tambah&usernames=$hasil[usernames]' class='btn-biru'>Edit</a>
					
					<a href='#' class='btn-merah' onclick=\"if(confirm('Apakah yakin menghapus data ?')){window.location.href='admin_proses.php?status=delete&usernames=$hasil[usernames]'};\">Hapus</a>
					
					</td>";
				
				echo"</tr>";
			$no++;
			}
	?>
</table>
<div style="float:left;">
<?php 
$jum = mysql_num_rows(mysql_query("SELECT * FROM _admin"))or die (mysql_error());

echo "Jumlah Data : $jum";
?>
</div>

<div style="float:right;">
<?php
$jml_data = ceil($jum/$batas);
for($i=1; $i<=$jml_data; $i++){
	if($i!=$batas){
		echo "<a href='index.php?pages=admin&hal=$i'><button style='padding:5px; background-color:#fff;'>$i</button></a>";
	}
		else {
			echo "<button style='padding:5px; background-color:#fff;'>$i</button>";
		}
	}
?>

</div>
</body>
<?php
include"koneksi.php";

if(isset($_GET['usernames'])){
$query = mysql_query ("Select * FROM _admin where usernames='$_GET[usernames]'") or die (mysql_error());
$result_edit = mysql_fetch_array($query);
}
?>
<body>
<div class="stambah">
<form action="admin_proses.php" method="POST" enctype="multipart/form-data">
<?php
	if(isset($_GET['usernames'])){
		echo "<input type='hidden' name='status' value='edit'>";
	}else {
		echo "<input type='hidden' name='status' value='add'>";
	}
?>
<h2 align="center" style="border-bottom:2px solid#000;">Tambah Data Admin</h2>
<table align="center">
	<tr>
		<td><label>Usernames</label></td>
		<td>:</td>
		<td><input type="text" class="form-control" name="txtuser" placeholder="username" value="<?php if(isset($result_edit['usernames'])) echo $result_edit['usernames'] ?>" required></td>
	</tr>
	
	<tr>
		<td><label>Password</label></td>
		<td>:</td>
		<td><input type="text" class="form-control" name="txtpass" placeholder="password" value="<?php if(isset($result_edit['passwords'])) echo $result_edit['passwords'] ?>"required></td>
	</tr>
	
	<tr>
		<td><label>Nama</label></td>
		<td>:</td>
		<td><input type="text" class="form-control" name="txtnama" placeholder="nama" value="<?php if(isset($result_edit['nama'])) echo $result_edit['nama'] ?>"></td>
	</tr>
	
	<tr>
		<td><label>Level</label></td>
		<td>:</td>
		<td ><input type="radio" name="txtlevel" value="1" checked>Admin
		<input type="radio" name="txtlevel" value="2" <?php if(@$result_edit['level'] == '2') echo "checked"; ?>>Pegawai</td>
	</tr>
	
	<tr>
		<td><label>Foto</label></td>
		<td>:</td>
		<td><input type="file" name="foto" ></td>
	<?php
		if(isset($_GET['usernames'])){
				echo"<img src='gambar/$result_edit[foto]' width='100' height='100'/>";
	?>
		<input type="checkbox" name="centang" value="1"><br>Centang Jika Ingin Mengganti Foto
	<?Php }?>
	</tr>
	<tr>
		<td colspan="2"><button class="btn-biru"> Tambah </button></td>
		<td ><button class="btn-merah" onclick="window.location.href='index.php?pages=admin'"> kembali </button></td>
	</tr>
	</table>
</form>
</div>
</body>
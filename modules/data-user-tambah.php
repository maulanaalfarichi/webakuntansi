<?php
include"../config/koneksi.php";

if(isset($_GET['username'])){
$query = mysqli_query ($conn,"Select * FROM user where Username='$_GET[username]'") or die (mysqli_error());
$result_edit = mysqli_fetch_array($query);
}
?>
<body>
<div class="stambah">
<form action="data-user-proses.php" method="POST" enctype="multipart/form-data">
<?php
	if(isset($_GET['username'])){
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
		<td><input type="text" class="form-control" name="txtuser" placeholder="username" value="<?php if(isset($result_edit['Username'])) echo $result_edit['Username'] ?>" required></td>
	</tr>
	
	<tr>
		<td><label>Password</label></td>
		<td>:</td>
		<td><input type="text" class="form-control" name="txtpass" placeholder="password" value="<?php if(isset($result_edit['Password'])) echo $result_edit['Password'] ?>"required></td>
	</tr>
	<tr>
		<td><label>Email</label></td>
		<td>:</td>
		<td><input type="email" class="form-control" name="txtemail" placeholder="email" value="<?php if(isset($result_edit['Email'])) echo $result_edit['Email'] ?>"required></td>
	</tr>
	<tr>
		<td><label>Nama</label></td>
		<td>:</td>
		<td><input type="text" class="form-control" name="txtnama" placeholder="nama" value="<?php if(isset($result_edit['Nama'])) echo $result_edit['Nama'] ?>"></td>
	</tr>
	
	<tr>
		<td><label>Level</label></td>
		<td>:</td>
		<td ><input type="radio" name="txtlevel" value="1" checked>Admin
		<input type="radio" name="txtlevel" value="2" <?php if(@$result_edit['level'] == '2') echo "checked"; ?>>Pegawai</td>
	</tr>
	
	<tr>
		<td colspan="2"><button class="btn-biru"> Tambah </button></td>
		<td ><button class="btn-merah" onclick="window.location.href='index.php?pages=admin'"> kembali </button></td>
	</tr>
	</table>
</form>
</div>
</body>
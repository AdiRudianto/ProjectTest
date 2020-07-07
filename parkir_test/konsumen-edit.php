<html>
<head>
	<title>Ubah Data</title>
</head>
<body>

 
	<?php
		include "connection.php";
 
		$ide = $_GET["Kode"];
 
		$sql = "SELECT * FROM konsumen WHERE no_polisi='$ide'";
		$query = mysqli_query($connection, $sql) or die (mysqli_error());
 
		if(mysqli_num_rows($query) > 0){
			$data = mysqli_fetch_array($query);
		}
	?>
 
	<form action="update.php" method="POST">
 
		<table>
  <tr>
				<td>No Polisi</td>
				<td>:</td>
				<td><input type="test" name="id" value="<?php echo $data["no_polisi"];?>"></td>
			</tr>
			<tr>
				<td>Konsumen</td>
				<td>:</td>
				<td><input type="text" name="nama" value="<?php echo $data["nm_konsumen"];?>"></td>
			</tr>
			<tr>
				<td>Jenis Kendaraan</td>
				<td>:</td>
				<td><input type="text" name="jenis_kendaraan" value="<?php echo $data["jenis_kendaraan"];?>"></td>
			</tr>
   <tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td><input type="text" name="tanggal_lahir" value="<?php echo $data["tanggal_lahir"];?>"></td>
			</tr>
   <tr>
				<td>Kelamin</td>
				<td>:</td>
				<td><input type="test" name="jenis_kelamin" value="<?php echo $data["jenis_kelamin"];?>"></td>
			</tr>
   <tr>
				<td>No Handphone </td>
				<td>:</td>
				<td><input type="test" name="no_hp" value="<?php echo $data["no_hp"];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<input type="submit" name="update" value="Update">
				</td>
			</tr>
		</table>
	</form>
 
</body>
</html>
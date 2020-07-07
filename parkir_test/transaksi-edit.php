<html>
<head>
	<title>Ubah Data</title>
</head>
<body>

 
	<?php
		include "connection.php";
 
		$ide = $_GET["Kode"];
 
		$sql = "SELECT * FROM transaksi WHERE kd_transaksi='$ide'";
		$query = mysqli_query($connection, $sql) or die (mysqli_error());
 
		if(mysqli_num_rows($query) > 0){
			$data = mysqli_fetch_array($query);
		}
	?>
 
	<form action="transaksi-update.php" method="POST">
 
		<table>
  <tr>
				<td>Kode transaksi</td>
				<td>:</td>
				<td><input type="text" name="id" value="<?php echo $data["kd_transaksi"];?>" readonly></td>
			</tr>
			<tr>
				<td>tanggal transaksi</td>
				<td>:</td>
				<td><input type="date" name="tgl_transaksi" value="<?php echo $data["tgl_transaksi"];?>"></td>
			</tr>
			<tr>
				<td>time masuk</td>
				<td>:</td>
				<td><input type="time" name="time_masuk" value="<?php echo $data["time_masuk"];?>"></td>
			</tr>
   <tr>
				<td>Time keluar</td>
				<td>:</td>
				<td><input type="time" name="time_keluar" value="<?php echo $data["time_keluar"];?>"></td>
			</tr>
   <tr>
				<td>Biaya</td>
				<td>:</td>
    <td><input type="text" name="biaya" value="<?php echo $data["biaya"];

     $waktu_awal = $data["time_masuk"];
     $waktu_akhir = $data["time_keluar"];
     
     //menghitung selisih dengan hasil detik
     $diff    =$waktu_akhir - $waktu_awal;
     
     //membagi detik menjadi jam
     $jam    =floor($diff / (60 * 60));

     $selisih = $jam;
    
    
    
    ?>" readonly></td>
			</tr>
   <tr>
				<td>No Polisi</td>
				<td>:</td>
				<td><input type="text" name="no_polisi" value="<?php echo $data["no_polisi"];?>"></td>
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
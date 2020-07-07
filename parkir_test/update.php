<?php
	include "connection.php";
 


 $id = $_POST["id"];
 $nm = $_POST["nama"];
 $jenis_kendaraan = $_POST["jenis_kendaraan"];
 $tanggal_lahir = $_POST["tanggal_lahir"];
 $jenis_kelamin= $_POST["jenis_kelamin"];
 $no_hp = $_POST["no_hp"];
 
	
	// query sql
	$sql = "UPDATE konsumen 
			SET nm_konsumen='$nm',
				jenis_kendaraan='$jenis_kendaraan',
				tanggal_lahir='$tanggal_lahir',
    jenis_kelamin='$jenis_kelamin',
    no_hp='$no_hp'
			WHERE no_polisi='$id'";
	$query = mysqli_query($connection, $sql) or die (mysqli_error());
 
	if($query){
		echo "Data berhasil dirubah!";
	} else {
		echo "Error".$sql."<br>".mysqli_error($koneksi);
	}
 
	mysqli_close($connection);
 
?>
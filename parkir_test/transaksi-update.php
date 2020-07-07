<?php
	include "connection.php";
 


 $id = $_POST["id"];
 $tgl_transaksi = $_POST["tgl_transaksi"];
 $time_masuk = $_POST["time_masuk"];
 $time_keluar= $_POST["time_keluar"];
 $biaya = $_POST["biaya"];
 $no_polisi = $_POST["no_polisi"];
 
	
	// query sql
	$sql = "UPDATE transaksi 
			SET kd_transaksi='$id',
				tgl_transaksi='$tgl_transaksi',
				time_masuk='$time_masuk',
    time_keluar='$time_keluar',
    biaya='$biaya',
    no_polisi='$no_polisi'
			WHERE kd_transaksi='$id'";
	$query = mysqli_query($connection, $sql) or die (mysqli_error());
 
	if($query){
		echo "Data berhasil dirubah!";
	} else {
		echo "Error".$sql."<br>".mysqli_error($koneksi);
	}
 
	mysqli_close($connection);
 
?>
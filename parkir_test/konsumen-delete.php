<?php
	include "connection.php";
 
	$idh = $_GET["Kode"];
 
	// query sql
	$sql = "DELETE FROM konsumen WHERE no_polisi='$idh'";
	$query = mysqli_query($connection, $sql) or die (mysqli_error());
 
	if($query){
		echo "Data berhasil di Hapus!";
	} else {
		echo "Error :".$sql."<br>".mysqli_error($connection);
	}
 
	mysqli_close($connection);
?>
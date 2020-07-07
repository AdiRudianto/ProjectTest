<?php
include_once "connection.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
<h3> Data Konsumen </h3>
<table>
      <tr>
        <th><strong>No</strong></th>
        <th><strong>Konsumen</strong></th>
        <th><strong>Jenis Kendaraan</strong></th>
        <th><strong>No Polisi</strong></th>
        <th><strong>Tanggal Lahir</strong></th>
        <th><strong>Kelamin</strong></th>
        <th><strong>No Hp</strong></th>

      </tr>
	<?php
	$mySql = "SELECT * FROM konsumen";
	$myQry = mysqli_query($connection,$mySql)  or die ("Query salah : ".mysql_error());
	$nomor  = 0; 
	while ($myData = mysqli_fetch_array($myQry)) {
		$nomor++;
		$Kode = $myData['no_polisi'];
	?>
      <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $myData['nm_konsumen']; ?></td>
        <td><?php echo $myData['jenis_kendaraan']; ?></td>
        <td><?php echo $myData['no_polisi']; ?></td>
        <td><?php echo $myData['tanggal_lahir']; ?></td>
        <td><?php echo $myData['jenis_kelamin']; ?></td>
        <td><?php echo $myData['no_hp']; ?></td>
        <td><a href='konsumen-delete.php?Kode=<?php echo $Kode; ?>'>Hapus</a></td>
        <td><a href='konsumen-edit.php?Kode=<?php echo $Kode; ?>'>Edit</a></td>
        
      </tr>
      <?php } ?>
    </table></td>


    <h3> Data Transaksi </h3>

    <table>
      <tr>
        <th><strong>No</strong></th>
        <th><strong>Nama</strong></th>
        <th><strong>No Polisi</strong></th>
        <th><strong>Tgl Transaksi</strong></th>
        <th><strong>Jam Masuk</strong></th>
        <th><strong>Jam Keluar</strong></th>
        <th><strong>Biaya</strong></th>
 

      </tr>
	<?php
	$mySql = "SELECT transaksi.kd_transaksi , transaksi.tgl_transaksi , transaksi.time_masuk , transaksi.time_keluar,transaksi.biaya,konsumen.no_polisi,konsumen.nm_konsumen
 FROM transaksi
 INNER JOIN konsumen
 ON transaksi.no_polisi = konsumen.no_polisi";
	$myQry = mysqli_query($connection,$mySql)  or die ("Query salah : ".mysql_error());
	$nomor  = 0; 
	while ($myData = mysqli_fetch_array($myQry)) {
		$nomor++;
		$Kode = $myData['kd_transaksi'];
	?>
      <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $myData['nm_konsumen']; ?></td>
        <td><?php echo $myData['no_polisi']; ?></td>
        <td><?php echo $myData['tgl_transaksi']; ?></td>
        <td><?php echo $myData['time_masuk']; ?></td>
        <td><?php echo $myData['time_keluar']; ?></td>
        <td><?php echo $myData['biaya']; ?></td>
        <td><a href='transaksi-edit.php?Kode=<?php echo $Kode; ?>'>Edit</a></td>
        <!-- <td><a href='konsumen-edit.php?Kode=<?php echo $Kode; ?>'>View</a></td> -->
     
        
      </tr>
      <?php } ?>
    </table></td>


  <h3>Form Transaksi </h3>
  <form action="submit.php" method="POST">
 
		<table>
  <tr>
				<td>No Polisi</td>
				<td>:</td>
				<td><input type="text" name="no_polisi"></td>
			</tr>
			<tr>
				<td>Tgl transaksi</td>
				<td>:</td>
				<td><input type="date" name="tgl_transaksi"></td>
			</tr>
			<tr>
				<td>Waktu Masuk</td>
				<td>:</td>
				<td><input type="time" name="time_masuk"></td>
			</tr>
   <tr>
				<td>waktu keluar</td>
				<td>:</td>
				<td><input type="time" name="time_keluar"></td>
			</tr>
   <tr>
				<td>biaya</td>
				<td>:</td>
				<td><input type="text" name="biaya"></td>
			</tr>
   
				<td></td>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Submit">
				</td>
			</tr>
		</table>
	</form>


</body>
</html>
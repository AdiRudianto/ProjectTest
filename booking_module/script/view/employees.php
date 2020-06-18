<?php
include_once "../library/library.php";
include_once "../library/connection.php";

# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 50;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM barang";
$pageQry = mysqli_query($connection,$pageSql) or die ("error paging: ".mysql_error());
$jml	 = mysqli_num_rows($pageQry);
$max	 = ceil($jml/$row);

include 'navbar.php';
?>


<table width="800" border="0" cellpadding="2" cellspacing="1" class="table-border">
  <tr>
    <td colspan="2" align="right"><h1><b> Employees Data </b></h1></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
	<table class="table-list" width="100%" border="0" cellspacing="1" cellpadding="2">
      <tr>

        <th width="24" align="center"><strong>No</strong></th>
        <th width="52"><strong>Kode</strong></th>
        <th width="364"><strong>Nama Employees</strong></th>
      
      </tr>



	<?php
	$mySql = "SELECT * FROM employees ORDER BY kd_employees ASC LIMIT $hal, $row";
	$myQry = mysqli_query($connection,$mySql)  or die ("Query salah : ".mysql_error());
	$nomor  = 0; 
	while ($myData = mysqli_fetch_array($myQry)) {
		$nomor++;
		$Kode = $myData['kd_employees'];
	?>
      <tr>

        <td><?php echo $nomor; ?></td>
        <td><?php echo $myData['kd_employees']; ?></td>
        <td><?php echo $myData['nm_employees']; ?></td>
      
      </tr>
      <?php } ?>
    </table></td>
  </tr>
  <tr>
    <td><strong>Jumlah Data :</strong> <?php echo $jml; ?> </td>
    <td align="right">
	<strong>Halaman ke :</strong> 
	<?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo " <a href='?page=employees-Data&hal=$list[$h]'>$h</a> ";
	}
	?>	</td>
  </tr>
</table>

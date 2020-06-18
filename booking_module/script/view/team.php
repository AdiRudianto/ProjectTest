<?php include 'navbar.php'; 

include_once "../library/library.php";
include_once "../library/connection.php";


$pageSql = "SELECT * FROM barang";
$pageSql2 = "SELECT * FROM temp_employees";
$pageQry = mysqli_query($connection,$pageSql) or die ("error paging: ".mysql_error());
$jml	 = mysqli_num_rows($pageQry);



// button tambah employees
if(isset($_POST['btn_employees'])){
  $pesanError = array();
  $kd_employees = $_POST['list_employees'];
  // INSERT INTO temp_employees SELECT * FROM employees WHERE kd_employees='E000001';

		# SIMPAN DATA KE DATABASE (temp_employees)
		# Jika jumlah error pesanError tidak ada, skrip di bawah dijalankan
			
			// Data yang ditemukan dimasukkan ke db temp 
			$tmpSql 	= "INSERT INTO temp_employees SELECT * FROM employees WHERE kd_employees=('$kd_employees')";
			mysqli_query($connection,$tmpSql) or die ("Gagal Query tmp : ".mysql_error());				
}
// button tambah product 
if(isset($_POST['btn_product'])){
  $pesanError = array();
  $kd_product = $_POST['list_product'];
  // INSERT INTO temp_employees SELECT * FROM employees WHERE kd_employees='E000001';

		# SIMPAN DATA KE DATABASE (temp_product)
		# Jika jumlah error pesanError tidak ada, skrip di bawah dijalankan
			
			// Data yang ditemukan dimasukkan ke db temp 
			$tmpSql 	= "INSERT INTO temp_product SELECT * FROM barang WHERE kd_barang=('$kd_product')";
			mysqli_query($connection,$tmpSql) or die ("Gagal Query tmp : ".mysql_error());				
}
// SaveAll 
if(isset($_POST['saveAll'])){
  $pesanError = array();
  $noKode = buatKode("team", "TM");


   // Team
  $teamName = $_POST['teamName'];
  $nmLeader = $_POST['list_leader'];
  // pindahkan data dr tabel temp ke tabel DBTeam
  $itemSql = "INSERT INTO team SET 
									kd_team='$noKode', 
									nm_team='$teamName', 
									nm_leader='$nmLeader'";
      mysqli_query($connection,$itemSql) or die ("Gagal Query ".mysql_error());
      

      // Baca data dari tabel TMP 
      # Ambil semua data barang/barang yang dipilih, berdasarkan user yg login
		$tmpSql ="SELECT * FROM temp_employees";
		$tmpQry = mysqli_query($connection,$tmpSql) or die ("Gagal Query Tmp".mysql_error());
		while ($tmpData = mysqli_fetch_array($tmpQry)) {
			// Membaca data dari tabel TMP
    $kdEmployees = $tmpData['kd_employees'];
    $nmEmployees = $tmpData['nm_employees'];
    $itemSql2 = "INSERT INTO list_employees SET 
      kd_team='$noKode', 
      nm_employees='$nmEmployees', 
      kd_employees='$kdEmployees'";
      mysqli_query($connection,$itemSql2) or die ("Gagal Query ".mysql_error());
    }
      # Kosongkan Tmp jika datanya sudah dipindah
	$hapusSql = "TRUNCATE TABLE temp_employees";
	mysqli_query($connection,$hapusSql) or die ("Gagal kosongkan tmp".mysql_error());
  
  // Product

  $tmpSql ="SELECT * FROM temp_product";
		$tmpQry = mysqli_query($connection,$tmpSql) or die ("Gagal Query Tmp".mysql_error());
		while ($tmpData = mysqli_fetch_array($tmpQry)) {
			// Membaca data dari tabel TMP
    $kdBarang = $tmpData['kd_barang'];
    $nmBarang = $tmpData['nm_barang'];
    $itemSql2 = "INSERT INTO tproduct SET 
      kd_team='$noKode', 
      nm_barang='$nmBarang', 
      kd_barang='$kdBarang'";
      mysqli_query($connection,$itemSql2) or die ("Gagal Query ".mysql_error());
    }

  $hapusSql2 = "TRUNCATE TABLE temp_product";
  mysqli_query($connection,$hapusSql2) or die ("Gagal Kosongkan tmp".mysql_error());


}

// Baca Variable Jika text sudah diisi akan tetap terisi
$datateamName	= isset($_POST['teamName']) ? $_POST['teamName'] : '';
$dataleaderName = isset($_POST['list_leader']) ? $_POST['list_leader'] : '';

?>


  <!-- Content Form  -->
  <form method="POST" target="_self" > 
  <div class="form-group mx-sm-3 mb-2">
    <label for="exampleFormControlInput1">Team Name</label>
    <input value="<?php echo $datateamName; ?>" name="teamName" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Team Name">
    <!-- <input type="text" value="<?php $noKode ?>" readonly> -->
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="exampleFormControlSelect1">Team leader</label>
    <select name="list_leader" class="form-control" id="exampleFormControlSelect1">
      <option></option>
      <?php 
      $mySql = "SELECT * FROM employees";
      $myQry = mysqli_query($connection,$mySql) or die ("Gagal Query".mysql_error());
      while ($myData = mysqli_fetch_array($myQry)) {
        if ( $dataleaderName == $myData['nm_employees']) {
          $cek = " selected";
        } else { $cek='';}
        echo "<option value='$myData[nm_employees]' $cek>$myData[kd_employees] $myData[nm_employees]</option> ";
      }
      ?>
    </select>
  </div>
<!-- Employees  -->
  <div class="form-group mx-sm-3 mb-2">
    <label for="exampleFormControlSelect1">Employees</label>
    <select name="list_employees" class="form-control" id="exampleFormControlSelect1">
      <option></option>
      <?php 
      $mySql = "SELECT * FROM employees";
      $myQry = mysqli_query($connection,$mySql) or die ("Gagal Query".mysql_error());
      while ($myData = mysqli_fetch_array($myQry)) {
        if ( $dataemployees == $myData['kd_employees']) {
          $cek = " selected";
        } else { $cek='';}
        echo "<option value='$myData[kd_employees]' $cek>$myData[kd_employees] $myData[nm_employees]</option> ";
      }
      ?>
    </select>
  </div>

  <button name="btn_employees" type="submit" class="btn btn-primary mx-sm-3 mb-2">Add Employees</button>
      <table class="table-dark mx-sm-3 mb-2 "  >
              <tr>
                <th colspan="7"><strong>List Employees</strong></th>
              </tr>
              <tr>
                <td width="26"><strong>No</strong></td>
                <td width="56"><strong>Kode </strong></td>
                <td width="387"><strong>Name </strong></td>
              </tr>

              <?php
            $mySql = "SELECT * FROM temp_employees";
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
       </table>

<!-- Equiment barang -->
  <div class="form-group mx-sm-3 mb-2">
    <label for="exampleFormControlSelect1">Product </label>
    <select  name="list_product" class="form-control" id="exampleFormControlSelect1">
    <option></option>
      <?php 
      $mySql = "SELECT * FROM barang";
      $myQry = mysqli_query($connection,$mySql) or die ("Gagal Query".mysql_error());
      while ($myData = mysqli_fetch_array($myQry)) {
        if ( $dataemployees == $myData['kd_barang']) {
          $cek = " selected";
        } else { $cek='';}
        echo "<option value='$myData[kd_barang]' $cek>[ $myData[kd_barang] ] $myData[nm_barang] </option> ";
      }
      ?>
    </select>
  </div>
  <button name="btn_product" type="submit" class="btn btn-primary mx-sm-3 mb-2">Add Product</button>
  <table class="table-dark mx-sm-3 mb-2 "  >
              <tr>
                <th colspan="7"><strong>List Product</strong></th>
              </tr>
              <tr>
                <td width="26"><strong>No</strong></td>
                <td width="56"><strong>Kode </strong></td>
                <td width="387"><strong>Name </strong></td>
              </tr>
              <?php
            $mySql = "SELECT * FROM temp_product";
            $myQry = mysqli_query($connection,$mySql)  or die ("Query salah : ".mysql_error());
            $nomor  = 0; 
            while ($myData = mysqli_fetch_array($myQry)) {
              $nomor++;
              $Kode = $myData['kd_barang'];
            ?>
                <tr>

                  <td><?php echo $nomor; ?></td>
                  <td><?php echo $myData['kd_barang']; ?></td>
                  <td><?php echo $myData['nm_barang']; ?></td>
                
                </tr>
                <?php } ?>
    </table>
    <br><br><br>
    <button name="saveAll" type="submit" class="btn-success btn-lg btn-block">Save</button>

</form>

<!-- End Content Form -->
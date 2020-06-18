<?php 
include "../library/connection.php";

$kdTeam = $_POST["kd_team"];
// $sql = "SELECT * FROM list_employees WHERE kd_team='$kdTeam'";
$sql = "SELECT list_employees.kd_team, team.nm_team , list_employees.nm_employees , list_employees.kd_employees , tproduct.nm_barang , tproduct.kd_barang
FROM list_employees
JOIN team ON list_employees.kd_team = team.kd_team 
JOIN tproduct ON list_employees.kd_team=tproduct.kd_team
WHERE list_employees.kd_team='$kdTeam'";

// Create empty array to hold query results
$someArray = [];


$query = mysqli_query($connection,$sql);


while ($row = mysqli_fetch_assoc($query)) {
 array_push($someArray, [
   'nm_team'   => $row['nm_team'],
   'nm_employees' => $row['nm_employees'],
   'kd_employees' => $row['kd_employees'],
   'nm_barang' => $row['nm_barang'],
   'kd_barang' => $row['kd_barang'],

 ]);
}
$someJSON = json_encode($someArray);
echo $someJSON;



?>
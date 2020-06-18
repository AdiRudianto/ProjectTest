<?php 
include "../library/connection.php";

$tim = $_POST['kd_team'];
$sql = "SELECT * FROM team WHERE kd_team='$tim'";
$query = mysqli_query($connection,$sql);
$fetch = mysqli_fetch_array($query);
$data = array(
 'kd_team' => $fetch['kd_team'],
 'nm_team' => $fetch['nm_team'],
 "nm_leader" => $fetch["nm_leader"],
); 


// $sql2 = "SELECT * FROM tproduct WHERE kd_team='$tim'";
// $query2 = mysqli_query($connection,$sql);
// $fetch2 = mysqli_fetch_array($query2);
// $data2 = array(
//  'kd_team' => $fetch['kd_team'],
//  'nm_barang' => $fetch['nm_barang'],
//  "kd_barang" => $fetch["kd_barang"],
// ); 


echo json_encode($data);
// echo json_encode($data2);
?>
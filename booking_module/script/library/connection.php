

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_booking";
$tablename = "booking";

$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection){
        die("Connection Failed:".mysqli_connect_error());
    }
$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
?>
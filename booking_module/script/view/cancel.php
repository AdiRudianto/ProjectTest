<?php
include 'navbar.php'
?>


<body>

<?php



	
		include '../library/connection.php';

		// Create connection
  $conn = mysqli_connect($servername, $username, $password,  $dbname);
  
		$id = intval(htmlspecialchars($_POST["id"]));

		$sql = "UPDATE $tablename SET canceled=1 WHERE id = $id";
		if (mysqli_query($connection, $sql)) {
			echo "<h3>Booking cancelled.</h3>";
		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		mysqli_close($connection);
	
?>

<a href="booking-order.php"><p>Back to the Booking Order</p></a>

</body>

</html>

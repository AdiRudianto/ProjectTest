<?php include 'navbar.php'

?> 

<body>

<?php


  include '../library/connection.php';

		$id = intval(htmlspecialchars($_POST["id"]));

		$sql = "DELETE FROM $tablename WHERE id = $id";
		if (mysqli_query($connection, $sql)) {
			echo "<h3>Booking deleted.</h3>";
		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($connection);
		}
		
		mysqli_close($connection);
	
?>

<a href="booking-order.php"><p>Back to the calendar</p></a>

</body>

</html>

<?php include 'navbar.php'

?> 

<body>

<?php

		include '../library/connection.php';
		
		
		$start_day = intval(strtotime(htmlspecialchars($_POST["start_day"])));
		$start_time = (60*60*intval(htmlspecialchars($_POST["start_hour"]))) + (60*intval(htmlspecialchars($_POST["start_minute"])));
		$end_day = intval(strtotime(htmlspecialchars($_POST["end_day"])));
		$end_time = (60*60*intval(htmlspecialchars($_POST["end_hour"]))) + (60*intval(htmlspecialchars($_POST["end_minute"])));
		$name = htmlspecialchars($_POST["name"]);
		$phone = htmlspecialchars($_POST["phone"]);
		$item = htmlspecialchars($_POST["item"]);
		$kd_team = htmlspecialchars($_POST['kd_team']);
		$nm_leader = htmlspecialchars($_POST['nm_leader']);
		
		$start_epoch = $start_day + $start_time;
		$end_epoch = $end_day + $end_time;
		
		// prevent double booking
		$sql = "SELECT * FROM $tablename WHERE item='$item' AND (start_day>=$start_day OR end_day>=$start_day) AND canceled=0";
		$result = mysqli_query($connection, $sql);
		if (mysqli_num_rows($result) > 0) {
			// handle every row
			while($row = mysqli_fetch_assoc($result)) {
				// check overlapping at 10 minutes interval
				for ($i = $start_epoch; $i <= $end_epoch; $i=$i+600) {
					if ($i>($row["start_day"]+$row["start_time"]) && $i<($row["end_day"]+$row["end_time"])) {
						echo '<h3><font color="red">Unfortunately ' . $item . ' has already been booked for the time requested.</font></h3>';
						goto end;
					}
				}
			}				
		}
				
		$sql = "INSERT INTO $tablename (name, phone, item, start_day, start_time, end_day, end_time, canceled, kd_team, nm_leader)
			VALUES ('$name','$phone', '$item', $start_day, $start_time, $end_day, $end_time, 0,'$kd_team','$nm_leader')";
		if (mysqli_query($connection, $sql)) {
		    echo "<h3>Booking succeed.</h3>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($connection);
		}
		
		end:
		mysqli_close($connection);
	
?>

<a href="booking-order.php"><p>Back to the booking Menu</p></a>

</body>

</html>

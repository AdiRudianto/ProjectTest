<?php
  // File: response.php

  // Get POST gender value
  $gender = $_POST["gender"];

  // Connect to the database
  // replace the parameters with your proper credentials
  $connection = mysqli_connect("localhost", "root", "", "test");

  // Query to run
  $query = mysqli_query($connection,
           "SELECT * FROM people WHERE gender ='$gender'");

  // Create empty array to hold query results
  $someArray = [];

  // Loop through query and push results into $someArray;
  while ($row = mysqli_fetch_assoc($query)) {
    array_push($someArray, [
      'name'   => $row['name'],
      'gender' => $row['gender']
    ]);
  }

  // Convert the Array to a JSON String and echo it
  $someJSON = json_encode($someArray);
  echo $someJSON;
?>
<?php
$servername = "localhost";
$username = "techsupport";
$password = "goin";
$dbname = "support";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST["name"];
$room = $_POST["room"];
$prob = $_POST["prob"];

if(empty($room)){
  echo "fuck you";
}

$sql = "INSERT INTO tasks (pname,room,prob) VALUES ('$name', '$room', '$prob')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
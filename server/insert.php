<?php
$servername = "localhost";
$username = "techsupport";
$password = "goin";
$dbname = "support";

$name = $_POST["name"];
$room = $_POST["room"];
$prob = $_POST["prob"];

$name = str_replace("\n"," ",$name);
$room = str_replace("\n"," ",$room);
$prob = str_replace("\n"," ",$prob);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo $prob;
if(empty($room)){
  die("Alle detaljer må fylles ut");
}

$sql = "INSERT INTO tasks (pname,room,prob) VALUES ('$name', '$room', '$prob')";

if (mysqli_query($conn, $sql)) {
  //echo "New record created successfully";
  include("complete.html");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
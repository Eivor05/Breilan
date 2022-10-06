<?php
$servername = "db.pergynt.xyz";
$username = "techsupport";
$password = "goin";
$dbname = "support";

$name = $_POST["name"];
$room = $_POST["room"];
$prob = $_POST["prob"];

$name = str_replace("\r\n"," ",$name);
$room = str_replace("\r\n"," ",$room);
$prob = str_replace("\r\n"," ",$prob);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(empty($room)){
  die("fuck you");
}

$sql = "INSERT INTO tasks (pname,room,prob) VALUES ('$name', '$room', '$prob')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
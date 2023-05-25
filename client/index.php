<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content = "10"/>
    <title>BreiLan</title>
    <link rel="stylesheet" href="helpcenter.css">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
</head>
<body>
<div class="center">
    <a href="list.html"><img class="logo" src="/assets/images/logo.svg"></a>
</div>
<div>
    <div>
        <table>
            <tr>
            <th>Priority</th>
            <th>Navn</th>
            <th>Klasserom</th>
            <th>Problem</th>
            </tr>
            <?php
            $servername = "localhost";
            $username = "techsupport";
            $password = "goin";
            $dbname = "support";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }
            
            if(isset($_GET["id"])){
                $sql = 'DELETE FROM tasks WHERE id="'. $_GET["id"] .'"';
                mysqli_query($conn, $sql);
                header("Refresh:0; url=index.php");
            }
            

            $sql = "SELECT id, pname, room, prob FROM tasks";
            $data = mysqli_query($conn, $sql);
            if(mysqli_num_rows($data) > 0){
                $pri = 1;
                while($row = mysqli_fetch_assoc($data)) {
                    echo "<tr><td>". $pri."</td><td>". $row["pname"] ."</td><td>". $row["room"] ."</td><td>". $row["prob"] ."</td><td id='slettborder'><a href='index.php?id=". $row["id"] ."'><button class='slett'>Slett</button></a></td></tr>";
                    $pri += 1;
                }
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
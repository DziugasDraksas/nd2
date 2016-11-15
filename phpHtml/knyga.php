<?php
/**
 * Created by PhpStorm.
 * User: dziugas
 * Date: 16.11.15
 * Time: 15.26
 */

$servername = "192.168.4.100";
$username = "project";
$password = "project";
$dbname = "Books";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pavadinimas = $_POST['kng'];

$sql = "SELECT year, name FROM Books,Authors WHERE 
      title='".$pavadinimas."' AND Books.authorId = Authors.authorId";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

        echo "Title: ".$pavadinimas."<br> Year: ".$row['year']."<br> Author: ".$row['name']."<br>";
    }
} else {
    $sql = "SELECT year FROM Books WHERE 
      title='".$pavadinimas."'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {

        echo "Title: ".$pavadinimas."<br> Year: ".$row['year']."<br> Author: None<br>";
    }


}
  echo "<a href='knygos.php'> Back</a>";
mysqli_close($conn);

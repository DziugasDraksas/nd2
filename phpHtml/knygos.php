<?php
/**
 * Created by PhpStorm.
 * User: dziugas
 * Date: 16.11.15
 * Time: 14.55
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

$sql = "SELECT title FROM Books";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {


        echo "<a>" . $row["title"].'</a><br>';
        echo "<form method='post' action='knyga.php'>
                    <input type='hidden' name='kng' value='".$row["title"]."' />
                    <input type='submit' value='Details' />
                </form>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
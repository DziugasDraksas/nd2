<?php
/**
 * Created by PhpStorm.
 * User: dziugas
 * Date: 16.11.15
 * Time: 14.55
 */


require_once ('book.php');
require_once ('Books.php');


$books =  new Books();

$books->load();
var_dump("asd");





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>List of books</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>List of all books</h2>
    <div class="list-group">
        <?php
        foreach ($books as $key => $value) {
            echo "<a href='details.php?id=" . $value->getBookId() . "' class='list-group-item'>" . $value->getTitle() . '</a>';
        }
        ?>
    </div>
</div>

</body>
</html>


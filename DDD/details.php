<?php
/**
 * Created by PhpStorm.
 * User: dziugas
 * Date: 16.11.15
 * Time: 18.34
 */


require_once('bookRepository.php');
require_once('book.php');
$id = $_GET['id'];

$book = new book();
$bookRep = new bookRepository();

$book = $bookRep->getBookById($id);
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="container">
        <h2>Details</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Author ID</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                echo "<td>".$book->getTitle()."</td>";
                echo "<td>".$book->getYear()."</td>";
                echo "<td>".$book->getAuthorId()."</td>";?>
            </tr>

            </tbody>
        </table>
        <div class="container">
            <button type="button" onclick="location.href='list.php';" class="btn btn-default">Back</button>
        </div>
    </div>

    </body>
    </html>

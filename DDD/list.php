<?php
/**
 * Created by PhpStorm.
 * User: dziugas
 * Date: 16.11.15
 * Time: 14.55
 */


require_once ('book.php');

require_once ('bookRepository.php');
$rep =  new bookRepository();
$books = new book();
$books = $rep->getAll();






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
            foreach ($books as $book) {
                echo "<a href='details.php?id=" . $book->getBookId() . "' class='list-group-item'>" . $book->getTitle() . '</a>';
            }
            ?>
        </div>
    </div>

    </body>
    </html>


<?php

/**
 * Created by PhpStorm.
 * User: dziugas
 * Date: 16.11.15
 * Time: 18.31
 */

require_once('./book.php');

class bookRepository
{


    public function getAll(){


        $servername = "192.168.4.100";
        $username = "project";
        $password = "project";
        $dbname = "Books";


        $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT bookId,title FROM Books";
        $result = mysqli_query($conn, $sql);
        $sk = 0;
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {

                $book[$sk] = new book();
                $book[$sk]->setBookId($row['bookId']);
                var_dump("viduj");
                $book[$sk]->setTitle($row['title']);
                $sk++;



//                echo "<a href='knyga.php?id=".$row['bookId']."'>" . $row["title"].'</a><br>';
            }
        } else {
            echo "0 results";
        }

        mysqli_close($conn);
        return $book;
    }

    public function getBookById($id){
        $book = new book();

        $servername = "192.168.4.100";
        $username = "project";
        $password = "project";
        $dbname = "Books";


        $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT bookId,title, year, authorId FROM Books WHERE bookId=".$id;
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $book->setBookId($row['bookId']);

                $book->setTitle($row['title']);
                $book->setAuthorId($row['authorId']);
                $book->setYear($row['year']);
            }
        }

        return $book;
    }
}
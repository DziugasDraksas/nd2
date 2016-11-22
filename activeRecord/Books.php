<?php

/**
 * Created by PhpStorm.
 * User: dziugas
 * Date: 16.11.22
 * Time: 00.33
 */
require_once ('./book.php');
class Books implements Iterator
{
    private $books_array = array();
    private $position = 0;

    function __construct()
    {
        $this->rewind();
    }

    function rewind()
    {
        $this->position = 0;
    }

    function current()
    {
        return $this->books_array[$this->position];
    }

    function key()
    {
        return $this->position;
    }

    function valid()
    {
        return $this->position < count($this->books_array);
    }

    function next()
    {
        ++$this->position;
    }

    public function load(){

        $servername = "192.168.4.100";
        $username = "project";
        $password = "project";
        $dbname = "Books";


        $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT bookId,title, year, authorId FROM Books";
        $result = mysqli_query($conn, $sql);
        $sk = 0;
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $book = new book();
                $book->setBookId($row['bookId']);
                $book->setTitle($row['title']);
                $book->setAuthorId($row['authorId']);
                $book->setYear($row['year']);

                array_push($this->books_array, $book);

            }
        }

        mysqli_close($conn);

    }


}
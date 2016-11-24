<?php

/**
 * Created by PhpStorm.
 * User: dziugas
 * Date: 16.11.22
 * Time: 00.33
 */
require_once ('./book.php');
require('./connection.php');
class Books implements Iterator
{
    private $books_array = array();
    private $position = 0;
    private $knyga;

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

        $sql = "SELECT bookId,title, year, authorId FROM Books WHERE bookId=".$this->position+1;
        $conn = getConn();
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $book = new book();
                $book->setBookId($row['bookId']);

                $book->setTitle($row['title']);
                $book->setAuthorId($row['authorId']);
                $book->setYear($row['year']);
                $this->knyga = $book;
            }
        }
        return $this->knyga;
    }

    function key()
    {
        return $this->position;
    }

    function valid()
    {
        return $this->knyga != null;
    }

    function next()
    {
        $this->position++;
        $sql = "SELECT bookId,title, year, authorId FROM Books WHERE bookId=".$this->position+1;
        $conn = getConn();
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $book = new book();
                $book->setBookId($row['bookId']);

                $book->setTitle($row['title']);
                $book->setAuthorId($row['authorId']);
                $book->setYear($row['year']);
                $this->knyga = $book;
            }
        }
        return $this->knyga;
    }




}

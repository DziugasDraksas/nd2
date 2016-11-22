<?php

/**
 * Created by PhpStorm.
 * User: dziugas
 * Date: 16.11.15
 * Time: 17.47
 */
class book
{
    private $id;
    private $authorId;
    private $title;
    private $year;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return book
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @param mixed $authorId
     * @return book
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return book
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     * @return book
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    public function load($id){
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
                $this->setId($row['bookId']);
                $this->setTitle($row['title']);
                $this->setAuthorId($row['authorId']);
                $this->setYear($row['year']);
            }
        }

    }

}
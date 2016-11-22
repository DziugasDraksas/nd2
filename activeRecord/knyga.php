<?php
/**
 * Created by PhpStorm.
 * User: dziugas
 * Date: 16.11.15
 * Time: 15.26
 */
require_once('book.php');

$id = $_GET['id'];
$book = new book();

$book->load($id);

echo "Pavadinimas: ".$book->getTitle()."<br>";
echo "Year: ".$book->getYear()."<br>";
echo "Author ID: ".$book->getAuthorId();

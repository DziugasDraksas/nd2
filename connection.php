<?php
/**
 * Created by PhpStorm.
 * User: dziugas
 * Date: 16.11.24
 * Time: 23.41
 */
function getConn(){
    $servername = "192.168.4.100";
    $username = "project";
    $password = "project";
    $dbname = "Books";


    //$conn = new mysqli($servername, $username, $password, $dbname);


    return $conn = new mysqli($servername, $username, $password, $dbname);
}
<?php

$conn = mysqli_connect("localhost" , "root" , "");

 if (!$conn) {
    die ("connect failed". mysqli_connect_error());
}

 $sql = "CREATE DATABASE IF NOT EXISTS TODO";

// TO MAKE AQUERY
$result = mysqli_query($conn , $sql);
mysqli_close($conn);


// create table
$conn = mysqli_connect("localhost" , "root" , "" , "todo");

 if (!$conn) {
    die ("connect failed". mysqli_connect_error());
}

 $sql = "CREATE TABLE IF NOT EXISTS tasks (
 
 `id` INT PRIMARY KEY AUTO_INCREMENT ,
 `title` VARCHAR(150) NOT NULL
 
 
 )";

// TO MAKE AQUERY
$result = mysqli_query($conn , $sql);
mysqli_error($conn);
mysqli_close($conn);


?>
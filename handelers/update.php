<?php

session_start();
$conn = mysqli_connect("localhost" , "root" , "" , "todo");

if (!$conn) {
   die ("connect failed". mysqli_connect_error());
}


if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['title'])){

    $title = trim(htmlentities(htmlspecialchars($_POST['title'])));
    $id = $_GET['id'];
    if(strlen($_POST['title']) < 3){
        header("location:../design/update.php?id=$id");
            $_SESSION['errors'] = "title must be more than three chars";
            die;
    }


    if(empty($_SESSION['errors'])){
     $sql = "UPDATE `tasks` SET `title` = '$title' where `id` = '$id'";
     $result = mysqli_query($conn , $sql);
     if($result) {
        $_SESSION['message'] = "data updated successfully";
         header("location:../design/index.php");
     }else{
        header("location:../design/upate.php?id=$id");
        die;
     }
    }
}


?>
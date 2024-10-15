<?php
session_start();
// create table
$conn = mysqli_connect("localhost" , "root" , "" , "todo");

 if (!$conn) {
    die ("connect failed". mysqli_connect_error());
}
if($_SERVER['REQUEST_METHOD'] == "POST" &&  isset($_POST['title'])){
    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));
    // echo $title;
        if(strlen($_POST['title']) < 3) {
            header("location:../design/index.php");
            $_SESSION['errors'] = "title must be more than three chars";
            die;
        }
    $sql = "INSERT INTO `tasks` (`title`) VALUES ('$title')";
    $result = mysqli_query($conn , $sql);
    if(mysqli_affected_rows($conn) > 0) {
        header("location:../design/index.php");
        $message = "data inserted successfully";
        $_SESSION['message'] = $message;
    }
}


?>
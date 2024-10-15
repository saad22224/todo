<?php
session_start();

var_dump($_GET['id']);
if(isset($_GET['id'])){
    $conn = mysqli_connect("localhost" , "root" , "" , "todo");

    if (!$conn) {
       die ("connect failed". mysqli_connect_error());
    };
    $id =  $_GET['id'];
  $sql = "DELETE FROM `tasks` where `id` = '$id'";
  $result = mysqli_query($conn , $sql);
  if(mysqli_affected_rows($conn) > 0) {
    header("location:../design/index.php");
    $message = "data deleted successfully";
    $_SESSION['message'] = $message;
}
}

?>
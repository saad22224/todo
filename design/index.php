
<?php session_start();
$conn = mysqli_connect("localhost" , "root" , "" , "todo");

if (!$conn) {
   die ("connect failed". mysqli_connect_error());
}

$sql = "SELECT * FROM `tasks`";
$result = mysqli_query($conn , $sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Document</title>
</head>

<body>

  

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="../handelers/handelers.php" method="POST" class="form border p-2 my-5">
                    <?php if(isset($_SESSION['message'])):?>
                    <h5 class="text-center alert alert-success "> <?php echo  $_SESSION['message']?></h5> 
                    <?php session_destroy()?>
                    <?php endif?>
                    <?php if(isset($_SESSION['errors'])):?>
                    <h5 class="text-center alert alert-danger"> <?php echo  $_SESSION['errors']?></h5> 
                    <?php session_destroy()?>
                    <?php endif?>
                    <input type="text" name="title" class="form-control my-3 border border-success" placeholder="add new todo">
                    <input type="submit" value="Add" class="form-control btn btn-primary my-3 " placeholder="add new todo">
                </form>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php       $i = 1;?>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)):?>
                      
                            <tr>
                                <td><?php echo $i++?></td>
                                <td><?php echo $row['title']?></td>
                                <td>
                                    <a href="../handelers/delete.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> </a>
                                    <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-info"><i class="fa-solid fa-edit"></i> </a>
                                </td>
                            </tr>
                         <?php endwhile?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
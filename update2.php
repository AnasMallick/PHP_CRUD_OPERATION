<?php
    $conn = mysqli_connect("localhost","root","","php_crud_anas");
    $uid = $_GET["uid"];
     $sql = "SELECT * FROM department where id = $uid";
     $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);

     if(isset($_POST["submit"])){
         $name = $_POST["name"];
         $email = $_POST["address"];
         $sql1 = "UPDATE department SET name='$name',email = '$address' WHERE  id = $uid";
         mysqli_query($conn,$sql1);
         header('Location:index2.php');
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DEPARTMENT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <form method="post" class="form-control">
    <label>NAME</label>
    <input type="text" name="name" value="<?php echo $row["dep_name"]  ?>" class="form-control" placeholder="Enter Your Name" required>
    <label>ADDRESS</label>
    <input type="text" name="address" value="<?php echo $row["dep_address"]  ?>" class="form-control" placeholder="Enter Your Address" required>
    <input type="submit" class="btn btn-danger" value="Submit" name="submit">
  </form>
  <br><br>
</body>

</html>
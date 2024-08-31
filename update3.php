<?php
    $conn = mysqli_connect("localhost","root","","php_crud_anas");
    $uid = $_GET["uid"];
     $sql = "SELECT * FROM student where id = $uid";
     $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);

     if(isset($_POST["submit"])){
         $name = $_POST["name"];
         $email = $_POST["email"];
         $gender = $_POST["gender"];
         $contact = $_POST["contact"];
         $sql1 = "UPDATE student SET name='$name',email = '$email',gender = '$gender',contact = '$contact' WHERE  id = $uid";
         mysqli_query($conn,$sql1);
         header('Location:index3.php');
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>STUDENT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <form method="post" class="form-control">
    <label>NAME</label>
    <input type="name" name="name" value="<?php echo $row["std_name"]  ?>" class="form-control" placeholder="Enter Your Name" required>
    <label>EMAIL</label>
    <input type="email" name="email" value="<?php echo $row["std_email"]  ?>" class="form-control" placeholder="Enter Your Email" required>
    <label>GENDER</label>
    <input type="text" name="gender" value="<?php echo $row["std_gender"]  ?>" class="form-control" placeholder="Enter Your Gender" required>
    <label>CONTACT NO.</label>
    <input type="number" name="contact" value="<?php echo $row["std_contact"]  ?>" class="form-control" placeholder="Enter Your Contact No." required>
    <input type="submit" class="btn btn-danger" value="Submit" name="submit">
  </form>
  <br><br>
</body>

</html>
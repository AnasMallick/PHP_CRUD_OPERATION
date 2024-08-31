<?php
    $conn = mysqli_connect("localhost","root","","php_crud_anas");
    $uid = $_GET["uid"];
     $sql = "SELECT * FROM employees where id = $uid";
     $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);

     if(isset($_POST["submit"])){
         $name = $_POST["name"];
         $email = $_POST["email"];
         $date = $_POST["date"];
         $contact = $_POST["contact"];
         $sql1 = "UPDATE employees SET name='$name',email = '$email',date = '$date',contact = '$contact' WHERE  id = $uid";
         mysqli_query($conn,$sql1);
         header('Location:index1.php');
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EMPLOYEES</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <form method="post" class="form-control">
    <label>NAME</label>
    <input type="name" name="name" value="<?php echo $row["emp_name"]  ?>" class="form-control" placeholder="Enter Your Name" required>
    <label>EMAIL</label>
    <input type="email" name="email" value="<?php echo $row["emp_email"]  ?>" class="form-control" placeholder="Enter Your Email" required>
    <label>DATE OF BIRTH</label>
    <input type="date" name="date" value="<?php echo $row["emp_dob"]  ?>" class="form-control" placeholder="Enter Your Date of Birth" required>
    <label>CONTACT NO.</label>
    <input type="number" name="contact" value="<?php echo $row["emp_contact"]  ?>" class="form-control" placeholder="Enter Your Contact No." required>    
    <input type="submit" class="btn btn-danger" value="Submit" name="submit">
  </form>
  <br><br>
</body>

</html>
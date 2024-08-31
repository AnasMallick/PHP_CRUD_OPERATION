<?php
    $conn = mysqli_connect("localhost","root","","php_crud_anas");
    $uid = $_GET["uid"];
     $sql = "SELECT * FROM customer where id = $uid";
     $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);

     if(isset($_POST["submit"])){
         $fname = $_POST["fname"];
         $lname = $_POST["lname"];
         $amount = $_POST["amount"];
         $quantity = $_POST["quantity"];
         $sql1 = "UPDATE customer SET fname='$fname',lname = '$lname',amount = '$amount',quantity = '$quantity' WHERE  id = $uid";
         mysqli_query($conn,$sql1);
         header('Location:index4.php');
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CUSTOMER</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <form method="post" class="form-control">
    <label> FIRST NAME</label>
    <input type="text" name="fname" value="<?php echo $row["cus_fname"]  ?>" class="form-control" placeholder="Enter Your First Name" required>
    <label>LAST NAME</label>
    <input type="text" name="lname" value="<?php echo $row["cus_lname"]  ?>" class="form-control" placeholder="Enter Your Last Name" required>
    <label>AMOUNT</label>
    <input type="number" name="amount" value="<?php echo $row["cus_amount"]  ?>" class="form-control" placeholder="Enter Your Amount" required>
    <label>QUANTITY</label>
    <input type="number" name="quantity" value="<?php echo $row["cus_quantity"]  ?>" class="form-control" placeholder="Enter Your Quantity" required>
    <input type="submit" class="btn btn-danger" value="Submit" name="submit">
  </form>
  <br><br>
</body>

</html>